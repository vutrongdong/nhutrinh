<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;

use App\User;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('admin.layout.index');
    }
    
    public function getAll(){
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.user.list', ['users' => $users]);
    }
    
    public function getAdd()
    {
    	return view('admin.user.add');
    }

    public function postAdd(UserAddRequest $request){
        $checkAZ = preg_match('/^[a-zA-Z]+$/', $request->name);
        $checkSpace = preg_match('/\S/', $request->name);
        if($checkAZ && $checkSpace) {
            $newUser = User::create($request->all());
            return redirect('admin/user/list')->with('thongbao', 'Bạn đã thêm người dùng thành công');
        } else {
            return back()->with('errorCheck', 'Tài khoản không được chứa ký tự đặc biệt và khoảng trắng');
        }
    }

    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit')->with(compact('user'));
    }

    public function postEdit(UserUpdateRequest $request, $id){
        $user = User::find($id);
        $checkAZ = preg_match('/^[a-zA-Z]+$/', $request->name);
        $checkSpace = preg_match('/\S/', $request->name);
        if($checkAZ && $checkSpace) {
            $user->name = $request->name;
            $user->save();
            return redirect('admin/user/list')->with('thongbao', 'Bạn đã sửa người dùng thành công');  
        } else {
            return back()->with('errorCheck', 'Tài khoản không được chứa ký tự đặc biệt và khoảng trắng');
        }
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('thongbao', 'Bạn đã xóa thành công');
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
