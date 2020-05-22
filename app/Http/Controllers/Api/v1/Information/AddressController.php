<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Information\AddressResource;
use App\Models\InformationManagement\Address;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AddressController extends ApiController
{
    // 'user_id',
    // 'district',
    // 'address1',
    // 'address2',

    public function getAddress()
    {
        try {
            // $address = Address::where('user_id', Auth::guard('api')->user()->user_id)->get();
            $address = Address::where('user_id', 1)->get();
            return parent::sendResponse('data', $address, 'Address Data');
        } catch (\Exception $e) {
            return parent::sendError('address list.', 216);
        }
    }

    public function updateAddress(Request $request)
    {
        try {
            if ($request->type == "add") {
                // $address = Address::where('user_id', Auth::guard('api')->user()->user_id)->get();
                $address = new Address;
                // $address->user_id = Auth::guard('api')->user()->user_id;
                $address->user_id = 1;
                $address->district = $request->district;
                $address->address1 = $request->address1;
                $address->address2 = $request->address2;
                $address->save();
                return parent::sendResponse('data', $address, 'Add Address');
            } elseif ($request->type == "update") {
                $address = Address::find($request->address_id);
                // if ($address->hasUser->id == Auth::guard('api')->user()->user_id) {
                if ($address->hasUser->id == 1) { //todo recomment
                    $address->district = $request->district;
                    $address->address1 = $request->address1;
                    $address->address2 = $request->address2;
                    $address->save();
                    return parent::sendResponse('data', $address, 'Update Address');
                } else {
                    return parent::sendError("This is not your address", 216);
                }
            } elseif ($request->type == "default") {
                $address = Address::find($request->address_id);
                // if ($address->hasUser->id == Auth::guard('api')->user()->user_id) {
                if ($address->hasUser->id == 1) { //todo recomment
                    // $oldAddress = Address::where('user_id', Auth::guard('api')->user()->user_id)->where('default', 1)->first();
                    $oldAddress = Address::where('user_id', 1)->where('default', 1)->first(); //todo recomment
                    if ($oldAddress) {
                        $oldAddress->default = 0;
                        $oldAddress->save();
                    }
                    $address->default = 1;
                    $address->save();
                    return parent::sendResponse('data', true, 'Update Default Address');
                } else {
                    return parent::sendError("This is not your address", 216);
                }
            }
            return parent::sendError("error-type", 216);
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    // public function getUserAddress(Request $request)
    // {
    //     // $model = User::find($request['userID']);
    //     return $request;
    // }
}
