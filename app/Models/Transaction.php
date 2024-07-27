<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id', 'invoice', 'transaction_code',
        'transaction_product_type', 'amount', 'transaction_date',
        'description', 'status', 'payment_methode', 'payment_link'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);  
    }
}
