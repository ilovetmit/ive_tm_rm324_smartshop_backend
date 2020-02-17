<?php

namespace App\Models\ExtraManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class Insurance extends Model
{
    use SoftDeletes;

    public $table = 'vending_products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'channel',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
