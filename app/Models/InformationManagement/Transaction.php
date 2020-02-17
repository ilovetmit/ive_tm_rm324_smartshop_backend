<?php

namespace App\Models\InformationManagement;

use App\Models\UserManagement\User;
use App\Models\LockerManagement\locker_transaction;
use App\Models\ProductManagement\product_transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'header',
        'user_id',
        'amount',
        'balance',
        'curreny',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class);
    }

    public function hasLocker_transaction()
    {
        return $this->hasMany(locker_transaction::class);
    }

    public function hasProduct_transaction()
    {
        return $this->hasMany(product_transaction::class);
    }
}
