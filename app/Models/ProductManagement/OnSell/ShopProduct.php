<?php

namespace App\Models\ProductManagement\OnSell;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\OnSell\LED;
use App\Models\ProductManagement\OnSell\ShopProductInventory;
use App\Models\ProductManagement\Product;

class ShopProduct extends Model
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
        return $this->belongsTo(Product::class);
    }

    public function hasLED()
    {
        return $this->hasMany(LED::class);
    }

    public function hasShopProductInventory()
    {
        return $this->hasMany(ShopProductInventory::class);
    }
}
