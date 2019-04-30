<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideAddRequest;
use App\Http\Requests\SlideUpdateRequest;
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

    public function postAdd(SlideAddRequest $request)
    {
        $slide = new Slide;
        $slide->title = $request->title;

        $file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();
        if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
        {
            return redirect('admin/slide/add')->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
        }
        $image = date('Y_m_d') ."_".date("h:i:sa"). '_' .$file->getClientOriginalName();
        $file->move('upload/slide', $image);
        imagejpeg($this->resize_image('upload/slide/'.$image, 1200, 500), 'upload/slide/'.$image);
        $slide->image = $image;

        $slide->slug = str_slug($request->title);
        $slide->image_path = '';
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao', 'Bạn đã thêm slide thành công');
    }
    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide'=>$slide]);
    }
    public function postSua(SlideUpdateRequest $request, $id){
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
            $image = date('Y_m_d') ."_".date("h:i:sa"). '_' .$file->getClientOriginalName();
            $file->move('upload/slide', $image);
            imagejpeg($this->resize_image('upload/slide/'.$image, 1200, 500), 'upload/slide/'.$image);
            if (file_exists('upload/slide/'.$slide->image)) {
                unlink('upload/slide/'.$slide->image);
            }
            $slide->image = $image;
        }
        $slide->save();
	    return redirect('admin/slide/list')->with('thongbao', 'Bạn đã sửa slide thành công');
    }
    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('thongbao', 'Bạn đã xóa Slide thành công');
    }

    public function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        switch(mime_content_type($file)) {
            case 'image/png':
              $src = imagecreatefrompng($file);
              break;
            case 'image/gif':
              $src = imagecreatefromgif($file);
              break;
            case 'image/jpeg':
              $src = imagecreatefromjpeg($file);
              break;
            case 'image/bmp':
              $src = imagecreatefrombmp($file);
              break;
            default:
              $src = null; 
        }
        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
        return $dst;
    }
}
