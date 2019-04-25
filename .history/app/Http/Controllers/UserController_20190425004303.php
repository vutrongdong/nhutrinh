<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.layout.index');
    }
    
    public function getDanhSach(){
    }
    public function getThem()
    {
    	return view('admin.user.them');
    }
    public function postThem(Request $request){
    
    }
    public function getSua($id){
    
    }
    public function postSua(Request $request, $id){

    }
    public function getXoa($id){
    }
    public function getDangnhapAdmin(){
    	return view("admin.login");
    }
    public function postDangnhapAdmin(Request $request){
        if(Auth::attempt(['name'=>$request->name, 'password'=>$request->password])){
            return redirect('/admin');
        } else {
            return redirect('/login')->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function getDangxuatAdmin(){
    	Auth::logout();
    	return redirect('/login');
    }
}
