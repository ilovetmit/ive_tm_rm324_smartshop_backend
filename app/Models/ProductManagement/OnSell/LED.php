<?php

namespace App\Models\ProductManagement\OnSell;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\OnSell\ShopProduct;

class LED extends Model
{
    use SoftDeletes;

    public $table = 'l_e_d_s';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'shop_product_id'
    ];

    public function hasShopProduct()
    {
        return $this->belongsTo(ShopProduct::class, 'shop_product_id', 'id');
    }
}
