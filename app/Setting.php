<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Setting extends Authenticatable {

    protected $fillable = [
        'title',
        'description',
        'name',
        'address',
        'phone',
        'email',
        'tax_number',
        'bank',
        'facebook',
    ];
}
