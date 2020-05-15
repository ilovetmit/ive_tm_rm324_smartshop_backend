<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class LEDResource extends JsonResource
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
        //     'shop_product_id'   => $this->shop_product_id,
        //     'created_at'        => $this->created_at,
        //     'updated_at'        => $this->updated_at,
        //     'deleted_at'        => $this->deleted_at,
        // ];
    }
}
