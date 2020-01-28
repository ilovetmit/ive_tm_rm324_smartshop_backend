<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';

    protected $fillable = [
        'image', 'title', 'description', 'status'
    ];

    public function getImageAttribute($value)
    {
        return config('variables.image.adver') . $value;
    }
}
