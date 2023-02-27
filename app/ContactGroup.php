<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model
{
    //
    protected $fillable = [
        'group_name', 'contact'
    ];
    public function newsletter() {
        $this->hasOne(Newsletter::class);
    }
}
