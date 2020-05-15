<?php

namespace App\Http\Resources\Locker;

use Illuminate\Http\Resources\Json\JsonResource;

class LockerResource extends JsonResource
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
        //     'qrcode'            => $this->qrcode,
        //     'per_hour_price'    => $this->per_hour_price,
        //     'is_active'         => $this->is_active,
        //     'is_using'          => $this->is_using,
        // ];
    }
}
