<?php

namespace App\Models\UserManagement;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;//, Auditable;

    public $table = 'roles';

    // public function getTable()
    // {
    //     return config('constant.TABLE')['013'];
    // }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasUser()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasPermission()
    {
        return $this->belongsToMany(Permission::class);
    }
}
