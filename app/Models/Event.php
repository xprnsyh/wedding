<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GuestBook;
use App\User;
use App\Models\Audio;
use PhpParser\Node\Expr\FuncCall;

class Event extends Model
{
    //
    protected $fillable = [
        'order_id', 'code_event', 'path_qr_code', 'template', 'slug', 'link_livestreaming',
        'nama_panggilan_mempelai_pria', 'nama_lengkap_mempelai_pria', 'avatar_pria',
        'nama_panggilan_mempelai_wanita', 'nama_lengkap_mempelai_wanita',  'avatar_wanita',
        'bio_mempelai_pria','bio_mempelai_wanita',
        'tanggal_ijab', 'tanggal_resepsi',
        'jam_mulai_ijab', 'jam_mulai_resepsi',
        'jam_selesai_ijab', 'jam_selesai_resepsi',
        'lokasi_ijab', 'lokasi_resepsi',
        'gm_ijab','gm_resepsi','created_by','link_youtube','yt_title','yt_desc','logo_req','audio_id',
        'monitor'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function photos()
    {
        return $this->hasMany(PhotoEvent::class);
    }
    public function guests()
    {
        return $this->hasMany(GuestBook::class,'event_id', 'id');
    }
    public function invite()
    {
        return $this->hasMany(Invite::class);
    }
    // public function invite()
    // {
    //     return $this->belongsToMany(User::class,'invites','event_id')->withPivot('kode_kupon','status','is_confirmed','is_invited');
    // }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'created_by');
    }

    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }

    public function angpao()
    {
        return $this->hasMany(Angpao::class, 'event_id', 'id');
    }

    public function inviteGroup()
    {
        return $this->hasMany(InviteGroup::class);    
    }
    
    public function templateMessage()
    {
        return $this->hasOne(TemplateMessage::class);
    }

    public function textSection()
    {
        return $this->hasOne(TextSection::class);        
    }
}
