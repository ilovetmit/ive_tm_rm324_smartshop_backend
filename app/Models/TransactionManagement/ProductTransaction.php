<?php

namespace App\Models\TransactionManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductManagement\Product;
   
class ProductTransaction extends Model
{
    use SoftDeletes;

    public $table = 'product_transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transaction_id',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function hasTransaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
