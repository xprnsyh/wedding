<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = "post_tags";
    protected $fillable = ["post_id", "tag_id"];

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
