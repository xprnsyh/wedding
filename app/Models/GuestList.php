<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GuestList extends Model
{
    protected $fillable = [
        'name','alamat','no_hp','klasifikasi','event_id'
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class,'guest_lists','id');
    }
}
