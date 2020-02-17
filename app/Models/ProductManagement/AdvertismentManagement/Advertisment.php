<?php

namespace App\Models\ProductManagement\AdvertismentManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class Advertisment extends Model
{
    use SoftDeletes;

    public $table = 'advertisments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'header',
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
}
