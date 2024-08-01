<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\User;

class GuestBook extends Model
{
    //
    protected $fillable = [
        'event_id', 'name', 'email', 'text'
    ];

    public function event()
    {
        return $this->belongsToMany(Event::class,'guest_books','id','event_id')
        ->withPivot('text');
    }
}
