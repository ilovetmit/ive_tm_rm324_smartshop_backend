<?php

namespace App\Models\SmartBankManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    public $table = 'stocks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'icon',
        'name',
        'data',
        'description'
    ];

    public function getIconAttribute($value)
    {
        return unserialize($value);
    }
    
    public function getDataAttribute($value)
    {
        return unserialize($value);
    }
}
