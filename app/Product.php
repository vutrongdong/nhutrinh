<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Authenticatable {

    use UploadTrait;

    protected $fillable = [
        'title', 'slug', 'code', 'price', 'date', 'image', 'image_path', 'note', 'active'
    ];

    public $imgPath = 'storage/images/products';

    /**
     * Physical path of upload folder.
     */
    public $uploadPath = 'app/public/images/products';

    /**
     * Image width.
     */
    public $imgWidth = 200;

    /**
     * Image height.
     */
    public $imgHeight = 200;

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'product_id', 'category_id');
    }
}
