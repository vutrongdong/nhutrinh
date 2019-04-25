<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.layout.index');
});

Route::group(['prefix' => ['admin']], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', 'AdminController@index');

        Route::prefix('/users')->group(function () {
            Route::get('/', 'UserController@index');
            Route::put('/reset_pass/{id}', 'UserController@resetPass');
        });

        Route::prefix('/slides')->group(function () {
            Route::get('/', 'SlideController@index');
            Route::get('/{id}', 'SlideController@show');
            Route::post('/upload', 'SlideController@uploadImage');
            Route::post('/create/', 'SlideController@create');
            Route::put('/update/{id}', 'SlideController@update');
            Route::delete('/{id}', 'SlideController@destroy');
        });

        Route::prefix('/categories')->group(function () {
            Route::get('/', 'CategoryController@index');
            Route::get('/{id}', 'CategoryController@show');
            Route::get('/parent/{diffIdCurent}', 'CategoryController@getCategoriesForSelect');
            Route::get('/blog/', 'CategoryController@getCategoriesForBlog');
            Route::get('/product/', 'CategoryController@getCategoriesForProduct');
            Route::get('/children/', 'CategoryController@getCategoriesForMenu');
            Route::post('/create', 'CategoryController@createCategory');
            Route::put('/update/{id}', 'CategoryController@updadeCategory');
            Route::delete('/{id}', 'CategoryController@removeCategory');
        });

        Route::prefix('/blogs')->group(function () {
            Route::get('/', 'BlogController@index');
            Route::get('/{id}', 'BlogController@show');
            Route::post('/upload', 'BlogController@uploadImage');
            Route::post('/create/', 'BlogController@createBlog');
            Route::put('/update/{id}', 'BlogController@updadeBlog');
            Route::delete('/{id}', 'BlogController@removeBlog');
        });

        Route::prefix('/products')->group(function () {
            Route::get('/', 'ProductController@index');
            Route::post('/upload', 'ProductController@uploadImage');
            Route::post('/create/', 'ProductController@createProduct');
        });
    });
});
