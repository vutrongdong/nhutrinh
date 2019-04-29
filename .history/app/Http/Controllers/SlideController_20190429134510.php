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
            $this->resize(500, $file);
            $file = $request->file('image');

            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return redirect('admin/slide/add')->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(3)."_".$name;
                //Kiểm tra tồn tại tên file
            while(file_exists('upload/slide/'.$image))
            {
                $image = $name;
            }
            // dd($file);
            $file->move('upload/slide', $image);
            $slide->image = $image;
        } else {
            $slide->image = "";
        }
        $slide->slug = str_slug($request->title);
        $slide->image_path = '';
        $slide->save();
        return redirect('admin/slide/add')->with('thongbao', 'Bạn đã thêm slide thành công');
    }
    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.sua', ['slide'=>$slide]);
    }
    public function postSua(Request $request, $id){
        $this->validate($request, 
            [
                'Ten' => 'required',
                'NoiDung'=>'required',
            ],
            [
            	'Ten.required' => 'Bạn chưa nhập tên',
            	'NoiDung.required' => 'Bạn chưa nhập nội dung'
            ]);
        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
        {
        	$slide->link = $request->link;
        }
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();

            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                // return redirect('admin/slide/sua/'.$id)->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(5)."_".$name;
                //Kiểm tra tồn tại tên file
            while(file_exists('upload/slide/'.$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move('upload/slide', $Hinh);
            unlink('upload/slide/'.$slide->Hinh);
            $slide->Hinh = $Hinh;
	        $slide->save();
	        return redirect('admin/slide/sua/'.$id)->with('thongbao', 'Bạn đã sửa slide thành công');
        } else {
        	return redirect('admin/slide/sua/'.$id)->with('loi', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
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

    public function resize($newWidth, $originalFile) {

        $info = getimagesize($originalFile);
        $mime = $info['mime'];
    
        switch ($mime) {
                case 'image/jpeg':
                        $image_create_func = 'imagecreatefromjpeg';
                        $image_save_func = 'imagejpeg';
                        $new_image_ext = 'jpg';
                        break;
    
                case 'image/png':
                        $image_create_func = 'imagecreatefrompng';
                        $image_save_func = 'imagepng';
                        $new_image_ext = 'png';
                        break;
    
                case 'image/gif':
                        $image_create_func = 'imagecreatefromgif';
                        $image_save_func = 'imagegif';
                        $new_image_ext = 'gif';
                        break;
    
                default: 
                        throw new Exception('Unknown image type.');
        }
    
        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);
    
        $newHeight = ($height / $width) * $newWidth;
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $image_save_func($tmp, "1");
    }
}
