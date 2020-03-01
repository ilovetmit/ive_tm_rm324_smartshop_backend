<?php

namespace App\Models\TransactionManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;
use App\Models\LockerManagement\Locker;

class LockerTransaction extends Model
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
        'receiver_id',
        'item',
        'deadline',
        'remark',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function hasLocker()
    {
        return $this->belongsTo(Locker::class, 'locker_id', 'id');
    }

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
