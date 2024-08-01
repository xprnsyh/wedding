<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\District;

class City extends Model
{

    public function district()
    {
        return $this->hasMany(District::class);
    }
}
