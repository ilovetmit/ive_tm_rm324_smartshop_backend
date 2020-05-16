<?php

namespace App\Http\Controllers\Api\v1\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Advertisement\AdvertisementResource;
use App\Models\AdvertisementManagement\Advertisement;
use Illuminate\Http\Request;

class Advertisementcontroller extends Controller
{
    public function getAll()
    {
        $model = Advertisement::all();
        return AdvertisementResource::collection($model);
    }

    public function getPromote()
    {
        try {
            $model = Advertisement::where('status', '1')->inRandomOrder()->take(6)->get();
            return AdvertisementResource::collection($model);
        } catch (\Exception $e) {
            return response(['message' => 'advertisement error']);
        }
    }
}
