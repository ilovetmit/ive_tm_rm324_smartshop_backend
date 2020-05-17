<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

class Vitcoin extends Model
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
        'public_key',
        'primary_key'
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
