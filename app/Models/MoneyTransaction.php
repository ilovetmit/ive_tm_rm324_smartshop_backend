<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MoneyTransaction extends Model
{
    protected $table = 'money_transactions';
    protected $fillable = [
        'remitter', 'remittee', 'amount', 'type'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function getRemitterAttribute($value)
    {
        return User::find($value)->name;
    }

    public function getremitteeAttribute($value)
    {
        return User::find($value)->name;
    }
}
