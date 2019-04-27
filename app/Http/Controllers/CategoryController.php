<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryAddRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $category = Category::with('parent')->orderBy('id', 'desc')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view('admin.category.list')->with(compact('category', 'search'));
    }

    public function getAdd(){
        $categorySelect = Category::where('parent_id', 0)->get();
    	return view('admin.category.add')->with(compact('categorySelect'));
    }

    public function postAdd(CategoryAddRequest $request){
    	$category = new Category;
    	$category->title = $request->title;
        $category->slug = str_slug($request->title);
    	$category->parent_id = str_slug($request->parent_id);
    	$category->save();

    	return redirect('admin/category/list')->with('thongbao', 'Bạn đã thêm danh mục thành công');    	
    }

    public function getEdit($id){
    	$category = Category::find($id);
        $categorySelect = Category::where([
                    ['parent_id', 0],
                    ['id', '<>' , $id]
                ])->get();
    	return view('admin.category.edit')->with(compact('categorySelect', 'category'));
    }

    public function postEdit(CategoryUpdateRequest $request, $id){
    	$category = Category::find($id);
    	$category->title = $request->title;
        $category->slug = str_slug($request->title);
        $category->parent_id = str_slug($request->parent_id);
    	$category->save();
    	return redirect('admin/category/list')->with('thongbao', 'Bạn đã sửa danh mục thành công');    	
    }
    
    public function destroy($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('admin/category/list')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
