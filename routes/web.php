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

/*
Route::get('/users/{name}/{id}',function($name,$id){
    return 'This is user ' . $name . ' with an id of ' . $id;
});
*/

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

route::resource('posts','PostsController');

Auth::routes();

Route::get('/home','DashboardController@alreadySignedIn');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/users','UsersController@index');

Route::get('/users/{id}','UsersController@showPosts');

Route::get('users/posts/{id}' , 'UsersController@show');
