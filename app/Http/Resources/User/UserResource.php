<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'data' => $this->collection,
            'id'                    => $this->id,
            'email'                 => $this->email,
            'first_name'            => $this->first_name,
            'last_name'             => $this->last_name,
            'password'              => $this->password,
            'vitcoin_address'       => $this->vitcoin_address,
            'vitcoin_primary_key'   => $this->vitcoin_primary_key,
            'avatar'                => $this->avatar,
            'birthday'              => $this->birthday,
            'gender'                => config('constant.gender')[$this->gender],
            'telephone'             => $this->telephone,
            'bio'                   => $this->bio,
            'status'                => config('constant.user_status')[$this->status],
            'interest'              => $this->hasInterest,
            'bankaccount'           => $this->hasBankAccount,
            'device'                => $this->hasDevice,
            'address'               => $this->hasAddress,
            'vitcoin'               => $this->hasVitcoin,
            'transaction'           => $this->hasTransaction,
            // 'remittancetransaction' => $this->hasRemittanceTransaction,
            // 'lockertransaction'     => $this->haslockerTransaction,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
            'deleted_at'            => $this->deleted_at,
            'remember_token'        => $this->remember_token,
            'email_verified_at'     => $this->email_verified_at,
        ];
    }
}
