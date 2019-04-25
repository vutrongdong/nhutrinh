<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Api\Http\Requests\ProductUpdateRequest;
use Modules\Api\Http\Requests\ProductAddRequest;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function getAll()
    {
        $products = Product::with('category')->orderBy('id','desc')->paginate(5);
        return view('admin.product.list', ['products' => $products]);
    }

    public function getAdd()
    {
        $category_product = Category::where([
                                        ['parent_id', '<>', 1],
                                        ['parent_id', '<>', 0]
                                    ])->get();
        return view('admin.product.add')->with(compact('category_product'));
    }


    public function postAdd()
    {
        $data = $this->productService->show($id);
        return $this->returnSuccess($data);
    }

    public function getEdit()
    {
        $category_product = Category::where([
                                        ['parent_id', '<>', 1],
                                        ['parent_id', '<>', 0]
                                    ])->get();
        return view('admin.product.edit')->with(compact('category_product'));
    }
    
    public function createProduct(ProductAddRequest $request)
    {
        $data = $this->productService->createProduct($request->all());
        return $this->returnSuccess($data);
    }

    public function updadeProduct(ProductUpdateRequest $request, $id)
    {
        $data = $this->productService->updadeProduct($request, $id);
        return $this->returnSuccess($data);
    }

    public function removeProduct($id)
    {
        $data = $this->productService->removeProduct($id);
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