<?php

namespace App\Models\LockerManagement;

use App\Models\UserManagement\User;
use App\Models\InformationManagement\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locker_transaction extends Model
{
    use SoftDeletes;

    public $table = 'locker_transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transaction_id',
        'locker_id',
        'reveiver_id',
        'item',
        'deadline',
        'remark',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasTransaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function hasLocker()
    {
        return $this->belongsTo(locker::class);
    }

    public function hasUser()
    {
        return $this->belongsTo(User::class);
    }
}
