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

// Announcement View
Route::get('announcements/{id}','AnnouncementsController@show');

/// Profile Controller Routes
Route::resource('profile','ProfileController');

/// Setting Controller Routes
Route::resource('settings','SettingController');

/// Admin Controller Routes
Route::get('/admin-panel','AdminsController@index');
Route::resource('announcements','AdminsController');
Route::get('/admin-panel/logs','AdminsController@logs');
Route::get('/admin-panel/posts','AdminsController@showPosts');
Route::get('/admin-panel/announcements','AdminsController@showAnnouncements');
Route::get('/admin-panel/users','AdminsController@showUsers');
Route::get('/admin-panel/admins','AdminsController@showAdmins');
Route::get('/admin-panel/posts/delete/{id}','AdminPostsController@destroy');
Route::get('/admin-panel/posts/edit/{id}','AdminPostsController@edit');
Route::get('/admin-panel/posts/{id}','AdminPostsController@show');
Route::get('/admin-panel/announcements/delete/{id}','AdminsController@destroy');
Route::get('/admin-panel/announcements/edit/{id}','AdminsController@edit');
Route::get('/admin-panel/announcements/{id}','AdminsController@show');
Route::get('/admin-panel/create-announcement','AdminsController@create');
Route::get('/admin-panel/users/{id}','AdminsController@viewUser');
Route::get('/admin-panel/users/ban/{id}','AdminsController@banUser');
Route::get('/admin-panel/users/remove-ban/{id}','AdminsController@removeBan');
Route::get('/admin-panel/users/make-admin/{id}','AdminsController@makeAdmin');
Route::get('/admin-panel/admins/{id}','AdminsController@viewAdmin');
Route::get('/admin-panel/admins/remove/{id}','AdminsController@removeAdmin');

// Admin Posts Controller
Route::resource('adminPosts','AdminPostsController');


// Announcements Controller Blade
Route::get('/announcements','AnnouncementsController@index');
Route::get('/announcements/{id}','AnnouncementsController@show');
