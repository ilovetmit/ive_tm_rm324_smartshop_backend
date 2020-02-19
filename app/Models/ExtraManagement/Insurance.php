<?php

namespace App\Models\ExtraManagement;

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
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
