<?php

namespace App\Http\Resources\Information;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserResource;
use App\Models\UserManagement\User;

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
        // return parent::toArray($request);
        return [
            // 'user_id'       => $this->user_id,
            'user_id'       => $this->hasUser->id,
            'district'      => config('constant.address_district')[$this->district],
            'address1'      => $this->address1,
            'address2'      => $this->address2,
        ];
    }
}
