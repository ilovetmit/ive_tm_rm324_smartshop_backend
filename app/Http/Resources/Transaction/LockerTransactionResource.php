<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class LockerTransactionResource extends JsonResource
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
        //     'transaction_id'     => $this->transaction_id,
        //     'locker_id'          => $this->locker_id,
        //     'recipient_user_id'  => $this->recipient_user_id,
        //     'item'               => $this->item,
        //     'deadline'           => $this->deadline,
        //     'remark'             => $this->remark,
        //     'created_at'         => $this->created_at,
        //     'updated_at'         => $this->updated_at,
        //     'deleted_at'         => $this->deleted_at,
        // ];
    }
}
