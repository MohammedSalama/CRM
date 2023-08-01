<?php

namespace Crm\Contacts;

use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;

interface ContactInterface
{
    /**
     * @return mixed
     */
    public function index();
    public function store(Request $request);
    public function edit($id);
    public function update(StoreContactRequest $request,$id);
    public function destroy($request);
}
