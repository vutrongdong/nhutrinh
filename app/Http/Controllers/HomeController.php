<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

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
}
