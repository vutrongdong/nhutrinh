<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\BlogAddRequest;
use App\Blog;
use App\Category;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $blogs = Blog::with('category')->orderBy('id', 'desc')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view('admin.blog.list')->with(compact('blogs', 'search'));
    }

    public function getAdd()
    {
        $category = Category::where('slug', 'blog')->first();
        // $categories = Category::where('parent_id', $category_blog->id)->get();
        return view('admin.blog.add')->with(compact('category'));
    }

    public function postAdd(BlogAddRequest $request)
    {
        $data = $request->only('title', 'content', 'teaser', 'category_id');
        if($request->active == 'on') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        // image
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return back()->with('errorCheck', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $image = date('Y_m_d') ."_".date("h:i:sa"). '_' .$file->getClientOriginalName();
            $file->move('upload/blog', $image);
            imagejpeg($this->resize_image('upload/blog/'.$image, 800, 800), 'upload/blog/'.$image);
            $data['image'] = $image;
        }
        // end image
        $data['slug'] = str_slug($request->title); 
        $data['image_path'] = '';
        $blog = Blog::create($data);
        return redirect('admin/blog/list')->with('thongbao', 'Bạn đã thêm bài viết thành công');
    }

    public function getEdit($id)
    {
        $blog = Blog::find($id);
        $category = Category::where('slug', 'blog')->first();
        // $categories = Category::where('parent_id', $category_blog->id)->get();
        return view('admin.blog.edit')->with(compact('category', 'blog'));
    }

    public function postEdit(BlogUpdateRequest $request, $id)
    {
        $blog = Blog::find($id);
        $data = $request->only('title', 'content', 'teaser', 'category_id');
        if($request->active == 'on') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        $data['slug'] = str_slug($request->title); 
        // image
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return back()->with('errorCheck', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $image = date('Y_m_d') ."_".date("h:i:sa"). '_' .$file->getClientOriginalName();
            $file->move('upload/blog', $image);
            imagejpeg($this->resize_image('upload/blog/'.$image, 900, 600), 'upload/blog/'.$image);
            if (file_exists('upload/blog/'.$blog->image)) {
                unlink('upload/blog/'.$blog->image);
            }
            $data['image'] = $image;
        }
        // end image
        $data['image_path'] = '';
        $blog->fill($data)->save();
        return redirect('admin/blog/list')->with('thongbao', 'Bạn đã sửa bài viết thành công');
    }

    public function changeActive(Request $request, $id) {
        $blog = Blog::find($id);
        $data = [];
        if($request->active == 'true') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        $blog->fill($data)->save();
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        if (file_exists('upload/blog/'.$blog->image)) {
            unlink('upload/blog/'.$blog->image);
        }
        $blog->delete();
        return redirect('admin/blog/list')->with('thongbao', 'Bạn đã xóa thành công');
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