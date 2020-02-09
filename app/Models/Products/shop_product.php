<?php

namespace App\Models\Products;

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
        'shop_product_id',
        'rfid_code',
        'is_sold',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function shop_product_products()
    {
        return $this->belongsTo(product::class);
    }

    public function shop_product_inventories_leds()
    {
        return $this->hasMany(LED::class);
    }

    public function shop_products_shop_product_inventories()
    {
        return $this->hasMany(shop_product_inventory::class);
    }
}
