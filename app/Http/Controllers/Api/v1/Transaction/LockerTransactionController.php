<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\LockerTransactionResource;
use App\Models\TransactionManagement\LockerTransaction;
use Illuminate\Http\Request;

class LockerTransactionController extends Controller
{
    public function getAll()
    {
        $model = LockerTransaction::all();
        return LockerTransactionResource::collection($model);
    }
}
