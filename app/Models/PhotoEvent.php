<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoEvent extends Model
{
    //
    protected $table = 'photo_events';
    protected $fillable = [
        'event_id', 'name', 'path', 'date', 'caption'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
