<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LogDB extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'user_id', 'ip', 'event', 'extra', 'agent', 'url', 'method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
