<?php

namespace Crm\Contacts\Controllers;

use App\Http\Controllers\Controller;
use Crm\Contacts\ContactInterface;
use Crm\Contacts\Models\Contact;
use Crm\Contacts\Requests\StoreContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param ContactInterface $contact
     */
    public function __construct(ContactInterface $contact)
    {
        $this->contactInterface = $contact;
    }

    /**
     * @return mixed
     */
    public function index()
    {
      return $this->contactInterface->index();
    }

    /**
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * @param StoreContactRequest $request
     * @return mixed
     */
    public function store(StoreContactRequest $request)
    {
        return $this->contactInterface->store($request);
    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->contactInterface->edit($id);
    }

    /**
     * @param StoreContactRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StoreContactRequest $request, $id)
    {
       return $this->contactInterface->update($request , $id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function destroy(Request $request)
    {
       return $this->contactInterface->destroy($request);
    }
}
