<?php

namespace App\Http\Controllers\Api\v1\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\TransactionManagement\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getAll()
    {
        $model = Transaction::all();
        return TransactionResource::collection($model);
    }
}
