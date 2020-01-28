<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    protected $table = 'lockers';
    protected $primaryKey = 'locker_id';
    protected $fillable = [
        'available', 'size', 'price', 'qrcode', 'hours'
    ];

    protected $hidden = [
        'created_at'
    ];

    public function getAvailableAttribute($value)
    {
        if ($value == true) {
            return 'available';
        } else {
            return 'unavailable';
        }
    }

  public function getPriceAttribute($value)
  {
    return unserialize($value);
  }

    public function setAvailableAttribute($value)
    {
        if ($value == 'available') {
            $this->attributes['available'] = true;
        } else {
            $this->attributes['available'] = false;
        }
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($locker) {
            $locker->attributes['qrcode'] = 'LOCKER-' . str_random(64);
        });
    }

    // protected $attributes = [
    //     'qrcode' => 'LOCKER-' . str_random(64);
    // ];
}
