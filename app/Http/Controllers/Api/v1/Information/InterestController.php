<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\InterestResource;
use App\Models\InformationManagement\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function getAll()
    {
        $model = Interest::all();
        return InterestResource::collection($model);
    }
}
