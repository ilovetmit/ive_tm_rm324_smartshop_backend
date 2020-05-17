<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

class Device extends Model
{
    use SoftDeletes;

    public $table = 'devices';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'token',
        'user_id',
        'is_active'
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
