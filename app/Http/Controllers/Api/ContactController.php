<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $contacts = ContactResource::collection(Contact::get());
        return $this->apiResponse($contacts , 'All Data About Contacts' , 200);
    }
    public function show($id)
    {
        $contacts = Contact::find($id);
        if($contacts)
        {
            return $this->apiResponse(new ContactResource($contacts) , 'Contact Data' , 200);
        }
        return $this->apiResponse(null , 'The Contact Not Found' , 404);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required',
            'url' => 'required|active_url'
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $contacts = Contact::create([
            'first_name' => $request ->first_name,
            'last_name' => $request -> last_name,
            'company_id' => $request -> company_id,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'url' => $request -> url
            ]);

        if($contacts)
        {
            return $this->apiResponse(new ContactResource($contacts) , 'Contact Data' , 201);
        }

        return $this->apiResponse(null , 'The Contact Not Saved' , 400);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required',
            'url' => 'required|active_url'
    ]);
        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $contacts = Contact::find($id);

        $contacts -> update([
            'first_name' => $request ->first_name,
            'last_name' => $request -> last_name,
            'company_id' => $request -> company_id,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'url' => $request -> url
        ]);

        if($contacts)
        {
            return $this->apiResponse(new ContactResource($contacts) , 'Contact Data' , 201);
        }
        return $this->apiResponse(null , 'The Contact Not Updated' , 404);
    }

    public function destroy($id)

    {
        $contacts = Contact::find($id);

        if(!$contacts)
        {
            return $this->apiResponse(null,'The Contact Person Not Found',404);
        }

        $contacts->delete($id);

        if($contacts)
        {
            return $this->apiResponse(null,'Contact Persons Deleted Successfully',200);
        }
    }

}

