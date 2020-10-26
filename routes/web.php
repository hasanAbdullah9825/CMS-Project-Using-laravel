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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories','CategoriesController');
    Route::resource('tags','TagsController');
    Route::resource('posts','PostsController')->middleware('VeryfiCategoriesCount');
    Route::get('trashed-posts','PostsController@trashed')->name('trashed-post.index');
    

});


Route::middleware(['auth','VerifyAdminMiddleware'])->group(function(){

    Route::get('user','UserController@index')->name('users.index');

    Route::post('users/{user}/make-admin','UserController@makeAdmin')->name('users.make-admin');
    Route::get('users/edit','UserController@edit')->name('users.edit');
    Route::put('users/update-profile','UserController@updateProfile')->name('users.update-profile');
});


