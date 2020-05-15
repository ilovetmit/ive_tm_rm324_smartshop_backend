<?php

namespace App\Http\Controllers\Api\v1\Locker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Locker\LockerResource;
use App\Models\LockerManagement\Locker;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function getAll()
    {
        $model = Locker::all();
        return LockerResource::collection($model);
    }
}
