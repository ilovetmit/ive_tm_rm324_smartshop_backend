<?php

namespace App\Models\Lockers;

use App\Models\Lockers\locker_transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locker extends Model
{
    use SoftDeletes;

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'qrcode',
        'per_hour_price',
        'is_active',
        'is_using',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function Lockers_locker_transaction()
    {
        return $this->hasMany(locker_transaction::class);
    }
}
