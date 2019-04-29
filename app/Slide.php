<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Slide extends Authenticatable {
    protected $fillable = [
        'title', 'image', 'image_path'
    ];

    public function getImage()
    {
        return $this->image ? asset($this->imgPath . '/' . $this->image) : 'http://via.placeholder.com/1024x500';
    }
}
