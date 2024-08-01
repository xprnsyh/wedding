<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextSection extends Model
{
    protected $fillable = [
        'event_id', 'quote', 'title'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
