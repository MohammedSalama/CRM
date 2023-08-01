<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use Crm\Companies\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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

            Company::create([
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
    public function show(Company $company)
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
        $company = Company::findorfail($id);
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
        $company = Company::findorFail($request->id);

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
    public function destroy(Request $request)
    {
        try {
            Company::destroy($request->company_id);
            session()->flash('Deleted', 'Data has been deleted successfully From Companies');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
