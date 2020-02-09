<?php

namespace App\Models\Lockers;

use App\Models\Accounts\User;
use App\Models\Account_Info_s\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locker_transaction extends Model
{
    use SoftDeletes;

    public $table = 'locker_transaction';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transaction_id',
        'locker_id',
        'reveiver_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // locker <-> locker_transaction <-> transaction
    public function locker_transactions_transactions()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function locker_transactions_lockers()
    {
        return $this->belongsTo(locker::class);
    }

    // locker <-> user
    public function locker_transactions_users()
    {
        return $this->belongsTo(User::class);
    }
}
