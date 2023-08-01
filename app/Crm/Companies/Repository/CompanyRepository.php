<?php

namespace Crm\Companies\Repository;

use Crm\Companies\CompanyInterface;
use Crm\Companies\Models\Company;
use Crm\Companies\Requests\StoreCompanyRequest;
use Illuminate\Http\Request;

class CompanyRepository implements CompanyInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('layouts.companies.index',compact('company'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * Move Logo
         */
        $logo = $request -> file('logo');
        $ext = $logo->getClientOriginalExtension();
        $name = "companies-".uniqid() . ".$ext";
        $logo -> move( public_path('storage/') , $name);

        CompanyInterface::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $name,
            'url' => $request->url
        ]);
        session()->flash('Add', __('Companies Data Added Successfully') );
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \Crm\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInterface $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Crm\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = CompanyInterface::findorfail($id);
        return view ('layouts.companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Crm\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        $company = CompanyInterface::findorFail($request->id);

        $name = $company -> logo;

        if($request->hasFile('logo'))
        {

            $logo = $request -> file('logo');
            $ext = $logo->getClientOriginalExtension();
            $name = "companies-".uniqid() . ".$ext";
            $logo -> move( public_path('storage') , $name);
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $name ,
            'url' => $request->url
        ]);
        session()->flash('Edit','Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Crm\Companies\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($companyId)
    {
        try {
            return CompanyInterface::findOrFail($companyId)->delete();
        } catch (\Exception $e) {
            throw $e; // You can handle the exception here or propagate it to the calling code.
        }
    }
}
