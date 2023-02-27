<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'kode_kupon', 'event_id', 'guest_id',
        'status', 'is_confirmed', 'is_invited',
        'attended_at'
    ];
    public function guests()
    {
        return $this->belongsToMany(User::class,'invites','id','guest_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,'invites','id');
    }
}
