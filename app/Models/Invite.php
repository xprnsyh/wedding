<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'name','address','no_hp','klasifikasi',
        'kode_qr', 'event_id', 'rand_code','tipe',
        'status', 'is_confirmed', 'is_invited',
        'attended_at'
    ];
    // public function guests()
    // {
    //     return $this->belongsToMany(User::class,'invites','id','guest_id');
    // }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function inviteGroup()
    {
        return $this->hasMany(InviteGroup::class);   
    }
    
}
