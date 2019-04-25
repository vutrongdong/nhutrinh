<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Slide extends Authenticatable {
	use UploadTrait;

    protected $fillable = [
        'title', 'image', 'image_path'
    ];

        /**
     * Full path of images.
     */
    public $imgPath = 'storage/images/slides';

    /**
     * Physical path of upload folder.
     */
    public $uploadPath = 'app/public/images/slides';

    /**
     * Image width.
     */
    public $imgWidth = 1200;

    /**
     * Image height.
     */
    public $imgHeight = 500;

    public function getImage()
    {
        return $this->image ? asset($this->imgPath . '/' . $this->image) : 'http://via.placeholder.com/1024x500';
    }
}
