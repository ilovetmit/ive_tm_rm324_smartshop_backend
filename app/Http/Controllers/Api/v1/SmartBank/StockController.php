<?php

namespace App\Http\Controllers\Api\v1\SmartBank;

use App\Http\Controllers\Controller;
use App\Http\Resources\SmartBank\StockResource;
use App\Models\SmartBankManagement\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function getAll()
    {
        $model = Stock::all();
        return StockResource::collection($model);
    }
}
