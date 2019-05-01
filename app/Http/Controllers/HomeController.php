<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function listBlog() {
        $category_blog = Category::where('slug', 'blog')->first();
        $blogs = Blog::where([
                            ['category_id', $category_blog->id],
                            ['active', 1]
                        ])
                        ->orderBy('view', 'DESC')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(12);
        return view('home.list_blog')->with(compact('blogs', 'category_blog'));
    }

    public function detailBlog($slug) {
    	$blog = Blog::where('slug', $slug)->first();
    	$blog->view += 1;
    	$blog->save();
    	return view('home.blog_detail')->with(compact('blog'));
    }

    public function productDetail($category_level_one, $category_level_two, $product) {
        $category_one = Category::where('slug', $category_level_one)->first();
        $category_two = Category::where('slug', $category_level_two)->first();
        $product_info = Product::where('slug', $product)->first();
        return view('home.product_detail')->with(compact('product_info', 'category_one', 'category_two'));
    }

    public function listProduct($category_level_one, $category_level_two) {
        $category_one = Category::where('slug', $category_level_one)->first();
        $category_two = Category::where('slug', $category_level_two)->first();
        $category_product = Category::where('slug', $category_level_two)->first()->products()->where('active', 1)->paginate(12);
        return view('home.list_product')->with(compact('category_one', 'category_two', 'category_product'));
    }
}
