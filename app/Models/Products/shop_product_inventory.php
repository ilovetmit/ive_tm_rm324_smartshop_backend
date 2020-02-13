<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class shop_product_inventory extends Model
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

    public function hasShop_product()
    {
        return $this->belongsTo(shop_product::class);
    }
}
