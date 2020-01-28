<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['user_id', 'total_price'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function item()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');         //Many表示一對多
    }
}
