<?php

namespace App\Http\Resources\SmartBank;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
        //     'code'          => $this->code,
        //     'icon'          => $this->icon,
        //     'name'          => $this->name,
        //     'data'          => $this->data,
        //     'description'   => $this->description,
        //     'created_at'    => $this->created_at,
        //     'updated_at'    => $this->updated_at,
        //     'deleted_at'    => $this->deleted_at,
        // ];
    }
}
