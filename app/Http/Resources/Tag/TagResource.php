<?php

namespace App\Http\Resources\Tag;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
        //     'name'          => $this->header,
        //     'description'   => $this->description,
        //     'created_at'    => $this->created_at,
        //     'updated_at'    => $this->updated_at,
        //     'deleted_at'    => $this->deleted_at,
        // ];
    }
}
