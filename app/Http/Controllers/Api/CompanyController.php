<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $company = CompanyResource::collection(Company::get());
        return $this->apiResponse($company , 'All Data About Companies' , 200);
    }
    public function show($id)
    {
        $company =Company::find($id);
        if($company)
        {
            return $this->apiResponse(new CompanyResource($company) , 'Company Data' , 200);
        }
        return $this->apiResponse(null , 'The Company Not Found' , 404);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'required|mimes:jpg,jpeg,png,',
            'url' => 'required|active_url'
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $logo = $request -> file('logo');
        $ext = $logo->getClientOriginalExtension();
        $name = "companies-".uniqid() . ".$ext";
        $logo -> move( public_path('storage/') , $name);

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $name,
            'url' => $request->url
            ]);

        if($company)
        {
            return $this->apiResponse(new CompanyResource($company) , 'Company Data' , 201);
        }
        return $this->apiResponse(null , 'The Company Not Saved' , 404);

    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'required|mimes:jpg,jpeg,png,',
            'url' => 'required|active_url'
        ]);

        if($validator->fails())
        {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $logo = $request -> file('logo');
        $ext = $logo->getClientOriginalExtension();
        $name = "companies-".uniqid() . ".$ext";
        $logo -> move( public_path('storage/') , $name);

        $company =Company::find($id);

        $company -> update ([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $name,
            'url' => $request->url
        ]);

        if($company)
        {
            return $this->apiResponse(new CompanyResource($company) , 'Company Data' , 201);
        }
        return $this->apiResponse(null , 'The Company Not Saved' , 404);
    }

    public function destroy($id)
    {
        $company = Company::find($id);

        if(!$company)
        {
            return $this->apiResponse(null,'Company Not Found',404);
        }

        $company->delete($id);

        if($company)
        {
            return $this->apiResponse(null,'The Company deleted',200);
        }
    }
}
