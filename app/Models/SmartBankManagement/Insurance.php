<?php

namespace App\Models\SmartBankManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurance extends Model
{
    use SoftDeletes;

    public $table = 'insurances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public function unserialize($value)
    {
        return unserialize($value);
    }

    public function getPriceAttribute($value)
    {
        return unserialize($value);
    }

    public function getImageAttribute($value)
    {
        return unserialize($value);
    }
}
