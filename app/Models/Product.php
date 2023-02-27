<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    //
    protected $fillable = ['name', 'slug', 'category_id','description','image','price'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
