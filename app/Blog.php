<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable {

    protected $fillable = [
        'title', 'slug', 'image', 'image_path', 'teaser', 'content', 'active', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
