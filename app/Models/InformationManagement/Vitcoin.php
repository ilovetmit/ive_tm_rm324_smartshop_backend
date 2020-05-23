<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;
use App\Http\Traits\Encryptable;

class Vitcoin extends Model
{
    use SoftDeletes, Encryptable;

    public $table = 'vitcoins';

    protected $encryptable = [
        'public_key',
        'primary_key'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'address',
        'public_key',
        'primary_key'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'user_id', 'id'];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
