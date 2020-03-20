<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

class BankAccount extends Model
{
    use SoftDeletes;

    public $table = 'bank_accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'current_account',
        'saving_account',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
