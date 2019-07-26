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

/// NavBar Contents Routes
Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');

/// Post Controller Routes
route::resource('posts','PostsController');

Auth::routes();

/// Dashboard Controller Routes
Route::get('/home','DashboardController@alreadySignedIn');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

/// User Controller Routes
Route::get('/users','UsersController@index');
Route::get('/users/{id}','UsersController@showProfile');
Route::get('/users/userposts/{id}','UsersController@showPosts');
Route::get('users/userposts/posts/{id}' , 'UsersController@show');
Route::get('/userSearch','UsersController@search');

/// Profile Controller Routes
Route::resource('profile','ProfileController');

/// Setting Controller Routes
Route::resource('settings','SettingController');

/// Admin Controller Routes

Route::get('/admin-panel','AdminsController@index');