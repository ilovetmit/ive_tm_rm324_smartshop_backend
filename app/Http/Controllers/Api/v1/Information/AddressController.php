<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\AddressResource;
use App\Models\InformationManagement\Address;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // 'user_id',
    // 'district',
    // 'address1',
    // 'address2',

    public function getAll()
    {
        $model = Address::all();
        return AddressResource::collection($model);
    }

    public function getAddressParameter_district()
    {
        return config('constant.address_district');
    }

    // public function getUserAddress(Request $request)
    // {
    //     // $model = User::find($request['userID']);
    //     return $request;
    // }
}
