<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopProductResource extends JsonResource
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
        //     'product_id'        => $this->header,
        //     'qrcode'            => $this->image,
        //     'created_at'        => $this->created_at,
        //     'updated_at'        => $this->updated_at,
        //     'deleted_at'        => $this->deleted_at,
        // ];
    }
}
