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

Route::get('/admin', function () {
    return view('admin.layout.index');
});

Route::get('/login', 'UserController@getDangnhapAdmin');
Route::post('/login', 'UserController@postDangnhapAdmin');
Route::post('/logout', 'UserController@getDangxuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function(){
                    //User
    Route::group(['prefix' => 'user'], function(){
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });
});