<?php

namespace Crm\Contacts\Repository;

use App\Http\Requests\StoreContactRequest;
use Crm\Companies\Models\Company;
use Crm\Contacts\ContactInterface;
use Crm\Contacts\Models\Contact;
use Illuminate\Http\Request;

class ContactRepository implements ContactInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $company = Company::all();
        return view('layouts.contacts.index',compact('contacts','company'));
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
    public function store(StoreContactRequest $request)
    {
//        dd($request);
        try {
            Contact::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_id' => $request->company_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'url' => $request->url
            ]);
            session()->flash('Add', __('Contacts Persons Added Successfully') );
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::findorfail($id);
        return view ('layouts.contacts.edit',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, $id)
    {
        $contacts = Contact::findorFail($request->id);
        try {
            $contacts->update([
                'first_name' => $request ->first_name,
                'last_name' => $request ->last_name,
                'company_id' => $request ->company_id,
                'email' => $request ->email,
                'phone' => $request ->phone,
                'url' => $request ->url
            ]);
            session()->flash('Edit','Updated Successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Crm\Contacts\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Contact::destroy($request->contact_id);
            session()->flash('Deleted', 'Contacts Persons has been deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
