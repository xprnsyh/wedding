<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'invoice', 'customer_id',
        'customer_name', 'customer_phone',
        'customer_address', 'status', 'district_id',
        'subtotal'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
