<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\VitcoinResource;
use App\Models\InformationManagement\Vitcoin;
use Illuminate\Http\Request;

class VitcoinController extends Controller
{
    public function getAll()
    {
        $model = Vitcoin::all();
        return VitcoinResource::collection($model);
    }
}
