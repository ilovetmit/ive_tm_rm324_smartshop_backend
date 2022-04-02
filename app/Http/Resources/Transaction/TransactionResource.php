<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
        //     'user_id'       => $this->user_id,
        //     'amount'        => $this->amount,
        //     'balance'       => $this->balance,
        //     'currency'      => $this->currency,
        //     'created_at'    => $this->created_at,
        //     'updated_at'    => $this->updated_at,
        //     'deleted_at'    => $this->deleted_at,
        // ];
    }
}
