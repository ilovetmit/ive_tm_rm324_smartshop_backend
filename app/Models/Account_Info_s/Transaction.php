<?php

namespace App\Models\Account_Info_s;

use App\Models\Accounts\User;
use App\Models\Lockers\locker_transaction;
use App\Models\Products\product_transaction;
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
