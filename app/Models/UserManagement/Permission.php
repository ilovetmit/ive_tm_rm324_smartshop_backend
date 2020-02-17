<?php

namespace App\Models\UserManagement;

// use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes; //, Auditable;

    public $table = 'permissions';

    // public function getTable()
    // {
    //     return config('constant.TABLE')['014'];
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

    public function hasRole()
    {
        return $this->belongsToMany(Role::class);
    }
}