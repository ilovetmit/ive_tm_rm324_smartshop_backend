<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = 'insurance';

    public function getPriceAttribute($value)
    {
        return unserialize($value);
    }

    public function getImageAttribute($value)
    {
        return unserialize($value);
    }
}
