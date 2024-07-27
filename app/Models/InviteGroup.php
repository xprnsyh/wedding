<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InviteGroup extends Model
{
    protected $fillable = [
        'name','address','no_hp','event_id',
        'invite_id','status', 'is_confirmed',
        'attended_at'
    ];

    public function invite()
    {
        return $this->belongsTo(Invite::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class); 
    }
}
