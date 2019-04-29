<?php


Route::get('/login', 'UserController@getDangnhapAdmin');
Route::post('/login', 'UserController@postDangnhapAdmin');
Route::post('/logout', 'UserController@getDangxuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => ['adminLogin']], function(){
	Route::get('/', function () {
	    return view('admin.dasboard.index');
	});
	// category
	Route::group(['prefix' => 'category'], function(){
		Route::get('list', 'CategoryController@index');

		Route::get('add', 'CategoryController@getAdd');
		Route::post('add', 'CategoryController@postAdd');

		Route::get('edit/{id}', 'CategoryController@getEdit');
		Route::post('edit/{id}','CategoryController@postEdit');

		Route::get('delete/{id}', 'CategoryController@destroy');
	});
	//User
	Route::group(['prefix' => 'user'], function(){
		Route::get('list', 'UserController@index');
		Route::get('add', 'UserController@getAdd');
		Route::post('add', 'UserController@postAdd');
		Route::get('edit/{id}', 'UserController@getEdit');
		Route::post('edit/{id}', 'UserController@postEdit');
		Route::get('reset_pass/{id}', 'UserController@getEditPass');
		Route::post('reset_pass/{id}', 'UserController@postEditPass');
		Route::get('delete/{id}', 'UserController@destroy');
	});
	//Slide
	Route::group(['prefix' => 'slide'], function(){
		Route::get('list', 'SlideController@index');

		Route::get('add', 'SlideController@getAdd');
		Route::post('add', 'SlideController@postAdd');

		Route::get('edit/{id}', 'SlideController@getSua');
		Route::post('edit/{id}', 'SlideController@getEdit');

		Route::get('delete/{id}', 'SlideController@destroy');
	});

	//Product
	Route::group(['prefix' => 'product'], function(){
		Route::get('list', 'ProductController@index');

		Route::get('add', 'ProductController@getAdd');
		Route::post('add', 'ProductController@postAdd');

		Route::get('edit/{id}', 'ProductController@getEdit');
		Route::post('edit/{id}', 'ProductController@postEdit');

		Route::get('delete/{id}', 'ProductController@destroy');
		Route::post('change_active/{id}', 'ProductController@changeActive');
	});

	//Blog
	Route::group(['prefix' => 'blog'], function(){
		Route::get('list', 'BlogController@index');

		Route::get('add', 'BlogController@getAdd');
		Route::post('add', 'BlogController@postAdd');

		Route::get('edit/{id}', 'BlogController@getEdit');
		Route::post('edit/{id}', 'BlogController@postEdit');
		Route::post('change_active/{id}', 'BlogController@changeActive');

		Route::get('delete/{id}', 'BlogController@destroy');
	});

	Route::group(['prefix' => 'setting'], function(){
		Route::get('/', 'SettingController@getSetting');
		Route::post('/update', 'SettingController@update');
	});
});

Route::prefix('/')->group(function () {
	Route::get('/', 'HomeController@index');
});
Route::post('/slide/upload', 'SlideController@uploadImage');
