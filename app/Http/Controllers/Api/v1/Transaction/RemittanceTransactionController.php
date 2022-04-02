<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\RemittanceTransactionResource;
use App\Models\TransactionManagement\RemittanceTransaction;
use Illuminate\Http\Request;

class RemittanceTransactionController extends Controller
{
    public function getAll()
    {
        $model = RemittanceTransaction::all();
        return RemittanceTransactionResource::collection($model);
    }
}
