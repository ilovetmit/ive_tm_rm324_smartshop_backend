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
            $address = Address::where('user_id', Auth::guard('api')->user()->id)->get();
            return parent::sendResponse('data', $address, 'Address Data');
        } catch (\Exception $e) {
            return parent::sendError('address list.', 216);
        }
    }

    public function getAddressList()
    {
        try {
            $addressList = Address::select('id', 'address1', 'address2', 'district')->where('user_id',  Auth::guard('api')->user()->id)->orderBy('default', 'desc')->orderBy('id')->get();
            $data = [];
            foreach ($addressList as $address) {
                $text = $address->address1 . ', ' . $address->address2 . ', ' . config('constant.address_district.' . $address->district);
                array_push($data, $text);
            }
            return parent::sendResponse('data', $data, 'Address List');
        } catch (\Exception $e) {
            return parent::sendError($e->getMessage(), 216);
        }
    }

    public function updateAddress(Request $request)
    {
        try {
            if ($request->type == "add") {
                $address = Address::where('user_id', Auth::guard('api')->user()->id)->get();
                $address = new Address;
                $address->user_id = Auth::guard('api')->user()->id;
                $address->district = $request->district;
                $address->address1 = $request->address1;
                $address->address2 = $request->address2;
                $address->default = 1;
                $oldAddress = Address::where('user_id', Auth::guard('api')->user()->id)->where('default', 1)->first();
                $oldAddress->default = 0;
                $oldAddress->save();
                $address->save();
                return parent::sendResponse('data', $address, 'Success, You can change default Address by Long Press');
            } elseif ($request->type == "update") {
                $address = Address::find($request->address_id);
                if ($address->hasUser->id == Auth::guard('api')->user()->id) {
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
                if ($address->hasUser->id == Auth::guard('api')->user()->id) {
                    $oldAddress = Address::where('user_id', Auth::guard('api')->user()->id)->where('default', 1)->first();
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

    public function deleteAddress($id)
    {
        try {

            $address = Address::find($id);
            if ($address->hasUser->id == Auth::guard('api')->user()->id) {
                if ($address->default == 1) {
                    $address->delete();
                    $newDefaultAddress = Address::where('user_id', Auth::guard('api')->user()->id)->where('default', 0)->first();
                    $newDefaultAddress->default = 1;
                    $newDefaultAddress->save();
                    return parent::sendResponse('data', true, 'Delete Address with Change Default');
                } else {
                    $address->delete();
                    return parent::sendResponse('data', true, 'Delete Address');
                }
            } else {
                return parent::sendError("This is not your address", 216);
            }
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
