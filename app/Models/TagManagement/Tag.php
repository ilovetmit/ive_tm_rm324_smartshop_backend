<?php

namespace App\Models\TagManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdvertisementManagement\Advertisement;
use App\Models\ProductManagement\Product;

class Tag extends Model
{
    use SoftDeletes;

    public $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description'
    ];

    public function hasProduct()
    {
        return $this->belongsToMany(Product::class);
    }

    public function hasAdvertisement()
    {
        return $this->belongsToMany(Advertisement::class);
    }
}
