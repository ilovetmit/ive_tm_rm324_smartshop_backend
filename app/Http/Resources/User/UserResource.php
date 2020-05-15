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
            'email'                 => $this->email,
            'first_name'            => $this->first_name,
            'last_name'             => $this->last_name,
            'password'              => $this->password,
            'vitcoin_address'       => $this->vitcoin_address,
            'vitcoin_primary_key'   => $this->vitcoin_primary_key,
            'avatar'                => $this->avatar,
            'birthday'              => $this->birthday,
            'gender'                => $this->gender,
            'telephone'             => $this->telephone,
            'bio'                   => $this->bio,
            'status'                => $this->status,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
            'deleted_at'            => $this->deleted_at,
            'remember_token'        => $this->remember_token,
            'email_verified_at'     => $this->email_verified_at,
        ];
    }
}
