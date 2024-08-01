<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\District;

class Province extends Model
{
    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function district()
    {
        return $this->hasMany(District::class);
    }
}
