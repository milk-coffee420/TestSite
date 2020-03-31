<?php

// TOPページ
Route::get('/', function () { return view('index'); })->name('home');



//認証
//Auth::routes();
Route::group(['prefix' => 'auth'], function (){
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});


//管理ページ
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'Auth\UserController@index')->name('admin.index');
    Route::get('profile', 'Auth\UserController@getProfile')->name('admin.profile');
    Route::get('{id}/edit', 'Auth\UserController@edit')->name('admin.edit');
    Route::patch('{id}/update', 'Auth\UserController@update')->name('admin.update');
    Route::post('{id}/delete', 'Auth\UserController@destroy')->name('admin.destroy');
    //お知らせ管理
    Route::resource('news', 'NewsController');
    Route::get('news/trashed/list', 'NewsController@getTrashed')->name('admin.news.trashed');
    Route::post('news/trashed/{id}/delete', 'NewsController@forceDelete')->name('admin.news.forcedelete');
    Route::post('news/trashed/{id}/restore', 'NewsController@restore')->name('admin.news.restore');
    //動画管理
    Route::resource('movie', 'MovieController');
    Route::get('movie/trashed/list', 'MovieController@getTrashed')->name('admin.movie.trashed');
    Route::post('movie/trashed/{id}/delete', 'MovieController@forceDelete')->name('admin.movie.forcedelete');
    Route::post('movie/trashed/{id}/restore', 'MovieController@restore')->name('admin.movie.restore');
    //ツイート
    Route::get('post', 'PostController@index')->name('admin.post.index');
    Route::get('post/create', 'PostController@create')->name('admin.post.create');
    Route::post('post/create', 'PostController@store')->name('admin.post.store');
    Route::post('post/{id}/delete', 'PostController@destroy')->name('admin.post.delete');
});

Route::get('error/{code}', function ($code) {
    abort($code);
});




