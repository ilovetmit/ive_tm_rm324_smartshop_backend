<?php

namespace App\Http\Resources\Information;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'user_id'       => $this->user_id,
        //     'district'      => $this->district,
        //     'address1'      => $this->address1,
        //     'address2'      => $this->address2,
        // ];
    }
}
