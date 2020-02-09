<?php

namespace App\Models\Account_Info_s;

use App\Models\Accounts\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vitcoins extends Model
{
    use SoftDeletes;

    public $table = 'vitcoins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'address',
        'primary_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function transactions_users()
    {
        return $this->belongsTo(User::class);
    }
}
