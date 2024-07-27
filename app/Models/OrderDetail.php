<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id',
        'price', 'qty'
    ];

    protected function Order()
    {
        return $this->belongsTo(Order::class);     
    }
}
