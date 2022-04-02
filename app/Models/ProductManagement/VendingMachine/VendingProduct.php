<?php

namespace App\Models\ProductManagement\VendingMachine;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\Product;

class VendingProduct extends Model
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
        'channel'
    ];

    public function hasProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
