<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $slides = Slide::orderBy('id', 'desc')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view('admin.slide.list')->with(compact('slides', 'search'));
    }

    public function getAdd(){
        return view('admin.slide.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, 
            [
                'title' => 'required',
            ],
            [
            	'title.required' => 'Bạn chưa nhập tên',
            ]);
        $slide = new Slide;
        $slide->title = $request->title;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/slide/add')->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(3)."_".$name;
            while(file_exists('upload/slide/'.$image))
            {
                $image = $name;
            }
            $file->move('upload/slide', $image);
            imagejpeg($this->resize_image('upload/slide/'.$image, 1200, 500), 'upload/slide/'.$image);
            $slide->image = $image;
        } else {
            return redirect('admin/slide/edit/'.$id)->with('loi', 'Bạn chưa chọn ảnh cần thay đổi');
        }
        $slide->slug = str_slug($request->title);
        $slide->image_path = '';
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao', 'Bạn đã thêm slide thành công');
    }
    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide'=>$slide]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request, 
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'Bạn chưa nhập tên',
        ]);
        $slide = Slide::find($id);
        $slide->title = $request->title;
        $slide->slug = str_slug($request->title);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/slide/edit/'.$id)->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(3)."_".$name;
            while(file_exists('upload/slide/'.$image))
            {
                $image = $name;
            }
            $file->move('upload/slide', $image);
            unlink('upload/slide/'.$slide->image);
            $slide->image = $image;
	        $slide->save();
	        return redirect('admin/slide/edit/'.$id)->with('thongbao', 'Bạn đã sửa slide thành công');
        } else {
        	return redirect('admin/slide/edit/'.$id)->with('loi', 'Bạn chưa chọn ảnh cần thay đổi');
        }
    }
    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao', 'Bạn đã xóa tập tin');
    }

    public function uploadImage(Request $request) {
        $slide = new Slide;
        if ($request->file('file')) {
            $image = $request->file('file');
        } else {
            $image = $request->file('files')[0];
        }
        if ($request->input('imageOld')) {
            $imageOld = $request->input('imageOld');
        } else {
            $imageOld = null;
        }
        if ($request->input('resize')) {
            return $slide->upload($image, true, $imageOld);
        }
        return $slide->upload($image, false, $imageOld);
    }

    public function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        return $dst;
    }
}
