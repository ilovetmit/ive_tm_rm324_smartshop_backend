<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class vending_product extends Model
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

    public function vending_products_products()
    {
        return $this->belongsTo(Product::class);
    }
}
