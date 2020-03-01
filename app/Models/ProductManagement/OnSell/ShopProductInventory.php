<?php

namespace App\Models\ProductManagement\OnSell;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\OnSell\ShopProduct;
   
class ShopProductInventory extends Model
{
    use SoftDeletes;

    public $table = 'shop_product_inventories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'shop_product_id',
        'rfid_code',
        'is_sold',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasShopProduct()
    {
        return $this->belongsTo(ShopProduct::class, 'shop_product_id', 'id');
    }
}
