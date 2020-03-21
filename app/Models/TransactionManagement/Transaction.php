<?php

namespace App\Models\TransactionManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

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
        'currency',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hasLocker_transaction()
    {
        return $this->hasOne(LockerTransaction::class);
    }

    public function hasProduct_transaction()
    {
        return $this->hasOne(ProductTransaction::class);
    }
    
    public function hasRemittance_transaction()
    {
        return $this->hasOne(RemittanceTransaction::class);
    }
}
