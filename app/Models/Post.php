<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = [
        'slug', 'title', 'excerpt', 'body', 'published', 'publish_date', 'featured_image',
        'featured_image_caption', 'user_id', 'meta', 'markdown'
    ];

    public function tag(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
