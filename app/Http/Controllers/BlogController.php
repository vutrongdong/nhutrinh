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
        $category_blog = Category::where('slug', 'blog')->first();
        $categories = Category::where('parent_id', $category_blog->id)->get();
        return view('admin.blog.add')->with(compact('categories'));
    }

    public function postAdd(BlogAddRequest $request)
    {
        $data = $request->only('title', 'content', 'image', 'teaser', 'category_id');
        if($request->active == 'on') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        $data['slug'] = str_slug($request->title); 
        $data['image_path'] = $request->image;
        $blog = Blog::create($data);
        return redirect('admin/blog/list')->with('thongbao', 'Bạn đã thêm bài viết thành công');
    }

    public function getEdit($id)
    {
        $blog = Blog::find($id);
        $category_blog = Category::where('slug', 'blog')->first();
        $categories = Category::where('parent_id', $category_blog->id)->get();
        return view('admin.blog.edit')->with(compact('categories', 'blog'));
    }

    public function postEdit(BlogUpdateRequest $request, $id)
    {
        $blog = Blog::find($id);
        $data = $request->only('title', 'content', 'image', 'teaser', 'category_id');
        if($request->active == 'on') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        $data['slug'] = str_slug($request->title); 
        $data['image_path'] = $request->image;
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
        $blog->delete();
        return redirect('admin/blog/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
    public function uploadImage(Request $request) {
        try {
            $this->validate($request, [
                'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ], [
                'files.*.image' => 'File upload không đúng định dạng',
                'files.*.mimes' => 'File upload phải là 1 trong các định dạng: :values',
                'files.*.max' => 'File upload không thể vượt quá :max KB',
                'file.image' => 'File upload không đúng định dạng',
                'file.mimes' => 'File upload phải là 1 trong các định dạng: :values',
                'file.max' => 'File upload không thể vượt quá :max KB',
            ]);
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
                return $this->model->upload($image, true, $imageOld);
            }
            return $this->model->upload($image, false, $imageOld);
        } catch (\Illuminate\Validation\ValidationException $validationException) {
            return response(['data' => [
                'errors' => $validationException->validator->errors(),
                'exception' => $validationException->getMessage(),
            ]])->json($data, 422);
        }
    }
}