<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = ['slug', 'name', 'meta'];

    public function post(){
        return $this->belongsToMany(Post::class, 'post_tags', 'post_id', 'tag_id');
    }
}
