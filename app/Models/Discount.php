<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'product_id', 'name' , 'discount_type', 'amount', 'is_active'
    ];

    public function product () {
        return $this->belongsTo(Product::class);
    }

}
