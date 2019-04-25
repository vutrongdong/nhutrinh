<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable {
    use UploadTrait;

    protected $fillable = [
        'title', 'slug', 'image', 'image_path', 'teaser', 'content', 'active', 'category_id'
    ];

    public $imgPath = 'storage/images/blogs';

    /**
     * Physical path of upload folder.
     */
    public $uploadPath = 'app/public/images/blogs';

    /**
     * Image width.
     */
    public $imgWidth = 800;

    /**
     * Image height.
     */
    public $imgHeight = 500;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
