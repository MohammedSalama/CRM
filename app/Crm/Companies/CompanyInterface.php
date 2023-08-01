<?php

namespace Crm\Companies;

use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Http\Request;

interface CompanyInterface
{
    /**
     * @return mixed
     */
    public function index();
    public function store(Request $request);
    public function edit($id);
    public function update(StoreCompanyRequest $request,$id);
    public function destroy($companyId);
}
