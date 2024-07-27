<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\District;

class Customer extends Model
{
    //
    protected $fillable = [
        'name', 'email',
        'phone_number', 'address',
        'status','district_id'
    ];


    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
