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
            $data = $request->only('title', 'code', 'price', 'note', 'date');
            if($request->active == 'on') {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }
            $data['slug'] = str_slug($request->title); 
            $data['image_path'] = $request->image;
            // image
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
            {
                return back()->with('errorCheck', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
            }
            $image = str_random(5). '.' .$duoi;
            $file->move('upload/product', $image);
            imagejpeg($this->resize_image('upload/product/'.$image, 600, 600), 'upload/product/'.$image);
            $data['image'] = $image;
            // end image
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
        if (file_exists('upload/product/'.$product->image)) {
            unlink('upload/product/'.$product->image);
        }
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
            $data = $request->only('title', 'code', 'price', 'note', 'date');
            if($request->active == 'on') {
                $data['active'] = 1;
            } else {
                $data['active'] = 0;
            }
            $data['slug'] = str_slug($request->title); 
            $data['image_path'] = '';
            // image
            if($request->hasFile('image'))
                {
                $file = $request->file('image');
                $duoi = $file->getClientOriginalExtension();
                if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg')
                {
                    return back()->with('errorCheck', 'Bạn chỉ được phép nhập ảnh có đuôi jpg, png, jpeg');
                }
                $image = str_random(5). '.' .$duoi;
                $file->move('upload/product', $image);
                imagejpeg($this->resize_image('upload/product/'.$image, 600, 600), 'upload/product/'.$image);
                if (file_exists('upload/product/'.$product->image)) {
                    unlink('upload/product/'.$product->image);
                }
                $data['image'] = $image;
            }
            // end image
            $product->fill($data)->save();
            $product->categories()->sync($request->categories);
            return redirect('admin/product/list')->with('thongbao', 'Bạn đã sửa sản phẩm thành công');
        } else {
            return back()->with('errorCheck', 'Bạn chưa chọn danh mục cha cho sản phẩm');
        }
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