<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Blog;
use App\Setting;
use App\Slide;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $categories_blog_menu = Category::with('children')->where([
                                        ['slug', 'blog'],
                                        ['parent_id', 0]
                                    ])->first();
        $categories_menu = Category::with('children')->where([
                                        ['slug', '<>', 'blog'],
                                        ['parent_id', 0]
                                    ])->take(5)->get();
        $setting_footer = Setting::find(1);
        $blog_hot = Blog::orderBy('view', 'desc')->where('active', 1)->take(4)->get();
        $slides_header = Slide::orderBy('id', 'desc')->take(5)->get();
        \View::share('categories_menu', $categories_menu);
        \View::share('categories_blog_menu', $categories_blog_menu);
        \View::share('setting_footer', $setting_footer);
        \View::share('slides_header', $slides_header);
        \View::share('blog_hot', $blog_hot);
    }
}
