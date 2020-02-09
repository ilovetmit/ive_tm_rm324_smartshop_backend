<?php

namespace App\Models\Accounts;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, Auditable;

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

    public function roles_users()
    {
        return $this->belongsToMany(User::class);
    }

    public function roles_permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
