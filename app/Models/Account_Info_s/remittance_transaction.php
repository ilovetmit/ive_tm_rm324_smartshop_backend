<?php

namespace App\Models\Account_Info_s;

use App\Models\Accounts\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class remittance_transaction extends Model
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

    public function remittance_transactions_users()
    {
        return $this->belongsTo(User::class);
    }

    public function remittance_transactions_transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
