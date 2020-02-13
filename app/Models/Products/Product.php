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

    public function hasTag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasCategory()
    {
        return $this->belongsToMany(Category::class);
    }

    public function hasProduct_wall()
    {
        return $this->hasMany(product_wall::class);
    }

    public function hasShop_product()
    {
        return $this->hasMany(shop_product::class);
    }

    public function hasProduct_transaction()
    {
        return $this->hasMany(product_transaction::class);
    }

    public function hasVending_product()
    {
        return $this->hasMany(vending_product::class);
    }
}
