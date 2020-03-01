<?php

namespace App\Models\ProductManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\Product;
   
class ProductWall extends Model
{
    use SoftDeletes;

    public $table = 'product_walls';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'qrcode',
        'product_id',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
