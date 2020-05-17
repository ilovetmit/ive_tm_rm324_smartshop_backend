<?php

namespace App\Models\AdvertisementManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TagManagement\Tag;

class Advertisement extends Model
{
    use SoftDeletes;

    public $table = 'advertisements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'header',
        'image',
        'description',
        'status'
    ];

    public function hasTag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
