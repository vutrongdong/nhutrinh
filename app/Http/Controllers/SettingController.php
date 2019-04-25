<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\SettingUpdateRequest;
use App\Seetting;

class SettingController extends Controller
{
    public function getSetting(){
    	// $category = Setting::orderBy('id', 'desc')->get();
    	return view('admin.setting.update');
    }
}
