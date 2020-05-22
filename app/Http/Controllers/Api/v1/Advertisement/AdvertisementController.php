<?php

namespace App\Http\Controllers\Api\v1\Advertisement;

use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Resources\Advertisement\AdvertisementResource;
use App\Models\AdvertisementManagement\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends ApiController
{
    // public function getAll()
    // {
    //     $model = Advertisement::all();
    //     return AdvertisementResource::collection($model);
    // }
    /**
     * @return \Illuminate\Http\Response
     */
    public function advertisement()
    {
        try {
            $advertisement = Advertisement::where('status', '1')->inRandomOrder()->take(6)->get();
            return parent::sendResponse('data', $advertisement, 'Advertisement Data');
        } catch (\Exception $e) {
            return response(['message' => 'advertisement error']);
        }
    }
}
