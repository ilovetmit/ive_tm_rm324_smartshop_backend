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

    public $table = 'transaction';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'header',
        'user_id',
        'amount',
        'curreny',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transactions_users()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions_locker_transactions()
    {
        return $this->hasMany(locker_transaction::class);
    }

    public function transactions_product_transactions()
    {
        return $this->hasMany(product_transaction::class);
    }
}
