<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
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

    public function products_tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function products_categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function products_product_walls()
    {
        return $this->hasMany(product_wall::class);
    }

    public function products_shop_products()
    {
        return $this->hasMany(shop_product::class);
    }

    public function products_product_transactions()
    {
        return $this->hasMany(product_transaction::class);
    }

    public function products_vending_product()
    {
        return $this->hasMany(vending_product::class);
    }
}
