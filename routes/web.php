<?php


Route::get('/login', 'UserController@getDangnhapAdmin');
Route::post('/login', 'UserController@postDangnhapAdmin');
Route::post('/logout', 'UserController@getDangxuatAdmin');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/', function () {
	    return view('admin.dasboard.index');
	});
	// category
	Route::group(['prefix' => 'category'], function(){
		Route::get('list', 'CategoryController@getAll');

		Route::get('add', 'CategoryController@getAdd');
		Route::post('add', 'CategoryController@postAdd');

		Route::get('edit/{id}', 'CategoryController@getEdit');
		Route::post('edit/{id}','CategoryController@postEdit');

		Route::get('delete/{id}', 'CategoryController@destroy');
	});
	//User
	Route::group(['prefix' => 'user'], function(){
		Route::get('list', 'UserController@getAll');
	});
	//Slide
	Route::group(['prefix' => 'slide'], function(){
		Route::get('list', 'SlideController@getAll');

		Route::get('add', 'SlideController@getAdd');
		Route::post('add', 'SlideController@postAdd');

		Route::get('edit/{id}', 'SlideController@getEdit');
		Route::post('edit/{id}', 'SlideController@getEdit');

		Route::get('delete/{id}', 'SlideController@destroy');
	});

	//Product
	Route::group(['prefix' => 'product'], function(){
		Route::get('list', 'ProductController@getAll');

		Route::get('add', 'ProductController@getAdd');
		Route::post('add', 'ProductController@postAdd');

		Route::get('edit/{id}', 'ProductController@getEdit');
		Route::post('edit/{id}', 'ProductController@getEdit');

		Route::get('delete/{id}', 'ProductController@destroy');
	});

	//Blog
	Route::group(['prefix' => 'blog'], function(){
		Route::get('list', 'BlogController@getAll');

		Route::get('add', 'BlogController@getAdd');
		Route::post('add', 'BlogController@postAdd');

		Route::get('edit/{id}', 'BlogController@getEdit');
		Route::post('edit/{id}', 'BlogController@getEdit');

		Route::get('delete/{id}', 'BlogController@destroy');
	});

	Route::group(['prefix' => 'setting'], function(){
		Route::get('/', 'SettingController@getSetting');
		Route::post('/update', 'SettingController@update');
	});
});