<?php

namespace App\Models\Products;

use App\Models\Account_Info_s;
use App\Models\Account_Info_s\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class product_transaction extends Model
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

    public function product_transactions_products()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_transactions_transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
