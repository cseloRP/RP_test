<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
        ->where('slug', '[\w\d\-\_]+');

Route::get('blog', 'BlogController@getList')->name('blog.index');

Route::get('gallery/{id}', ['as' => 'galleries.single', 'uses' => 'GalleryController@getSingle'])
    ->where('id', '[\d]+');

Route::get('galleries/list', 'GalleryController@getList')->name('gallery.index');;

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('/', 'pagesController@getIndex')->name('home');
Route::get('about', 'pagesController@getAbout')->name('about');;
Route::get('contact', 'pagesController@getContact')->name('contact.index');
Route::post('contact', 'pagesController@postContact')->name('contact.submit');

Route::resource('post', 'PostController');

Route::resource('album', 'AlbumController');

Route::resource('image', 'ImageController', ['except' => ['create']]);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});


Auth::routes();

