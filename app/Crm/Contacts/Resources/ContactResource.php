<?php

namespace Crm\Contacts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
//        parent::toArray($request);
        return [
            'id' => $this-> id,
            'first_name' => $this-> first_name,
            'last_name' => $this-> last_name,
            'email' => $this-> email,
            'phone' => $this-> phone,
            'url' => $this->url
        ];
    }
}
