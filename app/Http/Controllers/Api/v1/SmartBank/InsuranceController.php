<?php

namespace App\Http\Controllers\Api\v1\SmartBank;

use App\Http\Controllers\Controller;
use App\Http\Resources\SmartBank\InsuranceResource;
use App\Models\SmartBankManagement\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function getAll()
    {
        $model = Insurance::all();
        return InsuranceResource::collection($model);
    }
}
