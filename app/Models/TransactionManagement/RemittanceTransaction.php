<?php

namespace App\Models\TransactionManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;
use App\Models\TransactionManagement\Transaction;

class RemittanceTransaction extends Model
{
    use SoftDeletes;

    public $table = 'remittance_transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transaction_id',
        'payee_id'
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'payee_id', 'id');
    }

    public function hasTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
