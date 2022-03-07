<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
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
