<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable {

    protected $fillable = [
        'title', 'slug', 'code', 'price', 'date', 'image', 'image_path', 'note', 'active'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'product_id', 'category_id');
    }
}
