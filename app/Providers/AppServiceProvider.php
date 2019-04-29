<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;

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
        \View::share('categories_menu', $categories_menu);
        \View::share('categories_blog_menu', $categories_blog_menu);
    }
}
