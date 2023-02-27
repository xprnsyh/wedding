<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angpao extends Model
{
    protected $fillable = [
        'event_id',
        'no_rekening', 'nama_bank',
        'nama_penerima', 'status'
    ];

    
}
