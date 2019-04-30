<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function detailBlog($slug) {
    	$blog = Blog::where('slug', $slug)->first();
    	$blog->view += 1;
    	$blog->save();
    	return view('home.blog_detail')->with(compact('blog'));
    }

    public function productAll($category_level_one) {
    	$category = Category::where('slug', $category_level_one)->first();
    	// $categories_products = Category::where('parent_id', $category->id)->with('products')->get();
    	// $products = [];
    	// for($index=0; $index< count($categories_products); $index++) {
    	// 	for($indexProduct=0; $indexProduct< count($categories_products[$index]->products); $indexProduct++) {
    	// 		array_push($products, $categories_products[$index]->products[$indexProduct]);
    	// 	}
    	// }
    	// dd($products->paginate(5));
    	$categories_products = Category::where('parent_id', $category->id)->with('products')->get();
    	return view('home.list_product')->with(compact('categories_products', 'category'));
    }
}
