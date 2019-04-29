<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\Category;
use App\CategoryProduct;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $products = Product::orderBy('id', 'desc')->where('title', 'like', '%'.$search.'%')->paginate(5);
        return view('admin.product.list')->with(compact('products', 'search'));
    }

    public function getAdd()
    {
        $category_product = Category::where([
                                        ['parent_id', '<>', 1],
                                        ['parent_id', '<>', 0]
                                    ])->get();
        $dates = [];
        for($date = 1990; $date <= date("Y"); $date++) {
            array_push($dates, $date);
        }
        return view('admin.product.add')->with(compact('category_product', 'dates'));
    }


    public function postAdd(ProductAddRequest $request)
    {
        if($request->categories && count($request->categories) > 0) {
            $data = $request->only('title', 'code', 'price', 'image', 'note', 'date');
            if($request->active == 'on') {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }
            $data['slug'] = str_slug($request->title); 
            $data['image_path'] = $request->image;
            $product = Product::create($data);
            $product->categories()->sync($request->categories);
            return redirect('admin/product/list')->with('thongbao', 'Bạn đã thêm sản phẩm thành công');
        } else {
            return back()->with('errorCheck', 'Bạn chưa chọn danh mục cha cho sản phẩm');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->categories()->sync([]);
        $product->delete();
        return redirect('admin/product/list')->with('thongbao', 'Bạn đã xóa sản phẩm thành công');
    }

     public function getEdit($id)
    {
        $category_product = Category::where([
                                        ['parent_id', '<>', 1],
                                        ['parent_id', '<>', 0]
                                    ])->get();
        $dates = [];
        $product = Product::with('categories')->find($id);
        $cate_selected = [];
        for($index =0; $index < count($product->categories); $index++) {
            array_push($cate_selected, $product->categories[$index]->id);
        }
        for($date = 1990; $date <= date("Y"); $date++) {
            array_push($dates, $date);
        }
        return view('admin.product.edit')->with(compact('category_product', 'dates', 'product', 'cate_selected'));
    }

    public function changeActive(Request $request, $id) {
        $product = Product::find($id);
        $data = [];
        if($request->active == 'true') {
            $data['active'] = 1;
        } else {
            $data['active'] = 0;
        }
        $product->fill($data)->save();
    }
    
    public function postEdit(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        if($request->categories && count($request->categories) > 0) {
            $data = $request->only('title', 'code', 'price', 'image', 'note', 'date');
            if($request->active == 'on') {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }
            $data['slug'] = str_slug($request->title); 
            $data['image_path'] = $request->image;
            $product->fill($data)->save();
            $product->categories()->sync($request->categories);
            return redirect('admin/product/list')->with('thongbao', 'Bạn đã sửa sản phẩm thành công');
        } else {
            return back()->with('errorCheck', 'Bạn chưa chọn danh mục cha cho sản phẩm');
        }
    }
}