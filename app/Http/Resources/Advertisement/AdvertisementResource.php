<?php

namespace App\Http\Resources\Advertisement;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
        //     'header'        => $this->header,
        //     'image'         => $this->image,
        //     'description'   => $this->description,
        //     'status'        => $this->status,
        // ];
    }
}
