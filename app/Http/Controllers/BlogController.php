<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Requests\BlogAddRequest;
use App\Blog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $blogs = Blog::with('category')->orderBy('id', 'desc')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view('admin.blog.list')->with(compact('blogs', 'search'));
    }

    public function show($id)
    {
        $data = $this->blogService->show($id);
        return $this->returnSuccess($data);
    }

    public function createBlog(BlogAddRequest $request)
    {
        $data = $this->blogService->createBlog($request->all());
        return $this->returnSuccess($data);
    }

    public function updadeBlog(BlogUpdateRequest $request, $id)
    {
        $data = $this->blogService->updadeBlog($request, $id);
        return $this->returnSuccess($data);
    }

    public function removeBlog($id)
    {
        $data = $this->blogService->removeBlog($id);
        return $this->returnSuccess($data);
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