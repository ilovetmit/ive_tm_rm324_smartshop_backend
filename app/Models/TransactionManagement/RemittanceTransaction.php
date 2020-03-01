<?php

namespace App\Models\TransactionManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

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
        'remittee_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'remittee_id', 'id');
    }

    public function hasTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
