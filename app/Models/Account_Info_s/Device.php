<?php

namespace App\Models\Account_Info_s;

use App\Models\Accounts\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;

    public $table = 'addresses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'token',
        'user_id',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function devices_users()
    {
        return $this->belongsTo(User::class);
    }
}
