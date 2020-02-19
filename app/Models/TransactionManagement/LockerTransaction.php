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
        return $this->belongsTo(Locker::class);
    }

    public function hasUser()
    {
        return $this->belongsTo(User::class);
    }
}
