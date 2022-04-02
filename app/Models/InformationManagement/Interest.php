<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

class Interest extends Model
{
    use SoftDeletes;

    public $table = 'interests';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    public function hasUser()
    {
        return $this->belongsToMany(User::class);
    }
}
