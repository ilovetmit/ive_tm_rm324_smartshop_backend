<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
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
        'shop_product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasShop_product()
    {
        return $this->belongsTo(shop_product::class);
    }
}
