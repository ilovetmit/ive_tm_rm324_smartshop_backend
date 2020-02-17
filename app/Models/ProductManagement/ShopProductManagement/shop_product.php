<?php

namespace App\Models\ProductManagement\ShopProductManagement;

use App\Models\ProductManagement\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class shop_product extends Model
{
    use SoftDeletes;

    public $table = 'shop_products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_id',
        'qrcode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasProduct()
    {
        return $this->belongsTo(product::class);
    }

    public function hasLED()
    {
        return $this->hasMany(LED::class);
    }

    public function hasShop_product_inventory()
    {
        return $this->hasMany(shop_product_inventory::class);
    }
}
