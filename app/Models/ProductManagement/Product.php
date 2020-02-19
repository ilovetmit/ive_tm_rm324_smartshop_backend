<?php

namespace App\Models\ProductManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TagManagement\Tag;
use App\Models\ProductManagement\OnSell\ShopProduct;
use App\Models\ProductManagement\VendingMachine\VendingProduct;
use App\Models\ProductManagement\ProductWall;
use App\Models\TransactionManagement\ProductTransaction;

class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasTag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasCategory()
    {
        return $this->belongsToMany(Category::class);
    }

    public function hasProductWall()
    {
        return $this->hasMany(ProductWall::class);
    }

    public function hasShopProduct()
    {
        return $this->hasMany(ShopProduct::class);
    }

    public function hasProductTransaction()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    public function hasVendingProduct()
    {
        return $this->hasMany(VendingProduct::class);
    }
}
