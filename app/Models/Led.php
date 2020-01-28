<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Led extends Model
{
    protected $table = 'leds';
    protected $fillable = [
        'type', 'data'
    ];

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = serialize($value);
    }
}
