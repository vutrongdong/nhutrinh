<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingUpdateRequest;
use App\Setting;

class SettingController extends Controller
{
    public function getSetting(){
    	$setting = Setting::first();
    	return view('admin.setting.update')->with(compact('setting'));
    }

    public function update(SettingUpdateRequest $request) {
        $setting = Setting::find(1);
        $setting->fill($request->all())->save();
        return redirect('admin/setting/')->with('thongbao', 'Bạn đã cập nhật thành công'); 
    }
}
