<?php

namespace App\Models\ProductManagement\AdvertismentManagement;

use App\Models\ProductManagement\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
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
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasProduct()
    {
        return $this->belongsToMany(Product::class);
    }

    public function hasAdvertisment()
    {
        return $this->belongsToMany(Advertisment::class);
    }
}
