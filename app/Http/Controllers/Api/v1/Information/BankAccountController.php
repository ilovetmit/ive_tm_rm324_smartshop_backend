<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Http\Resources\Information\BankAccountResource;
use App\Models\InformationManagement\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function getAll()
    {
        $model = BankAccount::all();
        return BankAccountResource::collection($model);
    }
}
