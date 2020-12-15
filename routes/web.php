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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@index')->name('welcome');
Route::post('/form-search','WelcomeController@formSearch')->name('formSearch');
Route::get('blog/posts/{post}','Blog\PostsController@show')->name('blog.show');
Route::get('blog/categories/{category}','Blog\PostsController@category')->name('blog.category');
Route::get('blog/tags/{tag}','Blog\PostsController@tag')->name('blog.tag');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories','CategoriesController');
    Route::resource('tags','TagsController');
    Route::resource('posts','PostsController')->middleware('VeryfiCategoriesCount');
    Route::get('trashed-posts','PostsController@trashed')->name('trashed-post.index');
    Route::post('posts/restorertr/{post}','PostsController@restore')->name('posts.restore');
    

});


Route::middleware(['auth','VerifyAdminMiddleware'])->group(function(){

    Route::get('user','UserController@index')->name('users.index');

    Route::post('users/{user}/make-admin','UserController@makeAdmin')->name('users.make-admin');
    Route::get('users/edit','UserController@edit')->name('users.edit');//edit user profile
    Route::put('users/update-profile','UserController@updateProfile')->name('users.update-profile');//update user profile
});


