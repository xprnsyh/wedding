<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable = [
        'name', 'account_number', 'logo_bank', 'bank_name'
    ];
}
