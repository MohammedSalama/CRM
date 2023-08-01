<?php

namespace Crm\Contacts\Controllers\Api;

use App\Http\Controllers\Controller;
use Crm\Base\ApiResponseTrait;
use Crm\Contacts\Models\Contact;
use Crm\Contacts\Resources\ContactResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use ApiResponseTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactResource::collection(Contact::get());
        return $this->apiResponse($contacts , 'All Data About Contacts' , 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacts = Contact::find($id);
        if($contacts)
        {
            return $this->apiResponse(new ContactResource($contacts) , 'Contacts Data' , 200);
        }
        return $this->apiResponse(null , 'The Contacts Not Found' , 404);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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
            return $this->apiResponse(new ContactResource($contacts) , 'Contacts Data' , 201);
        }

        return $this->apiResponse(null , 'The Contacts Not Saved' , 400);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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
            return $this->apiResponse(new ContactResource($contacts) , 'Contacts Data' , 201);
        }
        return $this->apiResponse(null , 'The Contacts Not Updated' , 404);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    public function destroy($id)

    {
        $contacts = Contact::find($id);

        if(!$contacts)
        {
            return $this->apiResponse(null,'The Contacts Person Not Found',404);
        }

        $contacts->delete($id);

        if($contacts)
        {
            return $this->apiResponse(null,'Contacts Persons Deleted Successfully',200);
        }
    }

}

