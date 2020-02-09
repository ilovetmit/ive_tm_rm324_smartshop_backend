<?php

namespace App\Models\Products;

use App\Http\Controllers\ProductController;
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

    public function tags_products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function tags_advertisments()
    {
        return $this->belongsToMany(Advertisment::class);
    }
}
