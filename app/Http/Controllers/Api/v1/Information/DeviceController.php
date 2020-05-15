<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\DeviceResource;
use App\Models\InformationManagement\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function getAll()
    {
        $model = Device::all();
        return DeviceResource::collection($model);
    }
}
