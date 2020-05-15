<?php

namespace App\Http\Controllers\Api\v1\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\AddressResource;
use App\Models\InformationManagement\Address;
use Illuminate\Http\Request;

class Advertisementcontroller extends Controller
{
    public function getAll()
    {
        $model = Address::all();
        return AddressResource::collection($model);
    }
}
