<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateList extends Model
{
    protected $fillable = [
        'name','route','category','logo_template'
    ];
    
}
