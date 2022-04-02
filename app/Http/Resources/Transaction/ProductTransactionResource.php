<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTransactionResource extends JsonResource
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
        //     'transaction_id'    => $this->transaction_id,
        //     'product_id'        => $this->product_id,
        //     'quantity'          => $this->quantity,
        //     'created_at'        => $this->created_at,
        //     'updated_at'        => $this->updated_at,
        //     'deleted_at'        => $this->deleted_at,
        // ];
    }
}
