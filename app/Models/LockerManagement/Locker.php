<?php

namespace App\Models\LockerManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TransactionManagement\LockerTransaction;

class Locker extends Model
{
    use SoftDeletes;

    public $table = 'lockers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'qrcode',
        'per_hour_price',
        'is_active',
        'is_using'
    ];

    public function hasLockerTransaction()
    {
        return $this->hasMany(LockerTransaction::class);
    }
}
