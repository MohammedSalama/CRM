<?php

namespace Crm\Companies\Controllers\Api;

use App\Http\Controllers\Controller;
use Crm\Base\ApiResponseTrait;
use Crm\Companies\Models\Company;
use Crm\Companies\Resources\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function public_path;

class CompanyController extends Controller
{
    use ApiResponseTrait;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $company = CompanyResource::collection(Company::get());
        return $this->apiResponse($company , 'All Data About Companies' , 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $company =Company::find($id);
        if($company)
        {
            return $this->apiResponse(new CompanyResource($company) , 'Companies Data' , 200);
        }
        return $this->apiResponse(null , 'The Companies Not Found' , 404);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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
            return $this->apiResponse(new CompanyResource($company) , 'Companies Data' , 201);
        }
        return $this->apiResponse(null , 'The Companies Not Saved' , 404);

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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
            return $this->apiResponse(new CompanyResource($company) , 'Companies Data' , 201);
        }
        return $this->apiResponse(null , 'The Companies Not Saved' , 404);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|void
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if(!$company)
        {
            return $this->apiResponse(null,'Companies Not Found',404);
        }

        $company->delete($id);

        if($company)
        {
            return $this->apiResponse(null,'The Companies deleted',200);
        }
    }
}
