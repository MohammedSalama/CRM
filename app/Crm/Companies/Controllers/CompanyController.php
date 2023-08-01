<?php

namespace Crm\Companies\Controllers;

use App\Http\Controllers\Controller;
use Crm\Companies\CompanyInterface;
use Crm\Companies\Models\Company;
use Crm\Companies\Requests\StoreCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * @param CompanyInterface $company
     */
    public function __construct(CompanyInterface $company)
    {
        $this->companyInterface = $company;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->companyInterface->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->companyInterface->store($request);
    }

    /**
     * @param Company $company
     * @return void
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->companyInterface->index($id);
    }

    /**
     * @param StoreCompanyRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        return $this->companyInterface->update($request,$id);
    }

    /**
     * @param $companyId
     * @return mixed
     */
    public function destroy($companyId)
    {
       return $this->companyInterface->destroy($companyId);
    }
}
