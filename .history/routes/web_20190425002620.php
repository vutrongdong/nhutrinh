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

// Route::get('/admin', function () {
//     return view('admin.layout.index');
// });

Route::get('/login', 'UserController@getDangnhapAdmin');
Route::post('/login', 'UserController@postDangnhapAdmin');
Route::post('/logout', 'UserController@getDangxuatAdmin');


Route::group(['middleware' => ['auth']], function () {
	Route::prefix('/admin')->group(function () {
		Route::get('/', 'AdminController@index');
	});
});