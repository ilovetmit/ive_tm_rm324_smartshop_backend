<?php

namespace App\Http\Resources\Information;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
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
        //     'user_id'               => $this->user_id,
        //     'current_account'       => $this->current_account,
        //     'saving_account'        => $this->saving_account,
        // ];
    }
}
