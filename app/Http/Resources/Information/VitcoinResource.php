<?php

namespace App\Http\Resources\Information;

use Illuminate\Http\Resources\Json\JsonResource;

class VitcoinResource extends JsonResource
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
        //     'user_id'        => $this->user_id,
        //     'address'        => $this->address,
        //     'primary_key'    => $this->primary_key,
        // ];
    }
}
