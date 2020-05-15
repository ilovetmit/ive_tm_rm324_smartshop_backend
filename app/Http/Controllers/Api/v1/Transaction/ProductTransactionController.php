<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\ProductTransactionResource;
use App\Models\TransactionManagement\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    public function getAll()
    {
        $model = ProductTransaction::all();
        return ProductTransactionResource::collection($model);
    }
}
