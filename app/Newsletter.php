<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    //
    protected $fillable = [
        'contact_group_id', 'subject', 'content', 'contact_list'
    ];
    public function contact_group() {
        $this->belongsTo(ContactGroup::class);
    }
}
