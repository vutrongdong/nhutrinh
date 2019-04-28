<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CategoryProduct extends Authenticatable {
    protected $table = 'category_product';
    protected $fillable = [
        'category_id', 'product_id'
    ];
}
