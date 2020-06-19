<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('/', 'BlogsController@index');

// Route::get('/read', function () {
//     return view('blog.read');
// });

Route::get('/read/{slug}', 'BlogsController@read')->name('blog.read');
Route::get('/list-post', 'BlogsController@list')->name('list.post');
Route::get('/list-category/{category}', 'BlogsController@list_category')->name('blog.category');
Route::get('/search', 'BlogsController@search')->name('blog.search');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/category', 'CategoriesController');

    Route::resource('/tag', 'TagsController');

    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::delete('/post/burn/{id}', 'PostsController@burn')->name('post.burn');
    Route::get('/post/tampil_sampah', 'PostsController@tampil_sampah')->name('post.tampil_sampah');

    Route::resource('/post', 'PostsController');

    Route::resource('/user', 'UsersController');
});
