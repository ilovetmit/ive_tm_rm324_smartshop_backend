<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;
use App\Models\LockerManagement\Locker;

class FaceData extends Model
{
    public $table = 'face_data';

    public function getAgeAttribute($value)
    {
        return unserialize($value);
    }

    public function getExpressionAttribute($value)
    {
        return unserialize($value);
    }
}
