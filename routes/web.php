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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');


//ログイン中のページ
Route::group(['middleware' => 'auth'], function () {
Route::get('/index','PostsController@index');

Route::get('/index', 'FollowsController@followed');

Route::get('/index', 'PostsController@showPosts');
Route::post('/index', 'PostsController@postTweet');

Route::post('/post/edit', 'PostsController@postEdit');
Route::get('/post/{id}/delete', 'PostsController@postDelete');


Route::get('/profile','UsersController@profile');
Route::post('/profileEdit','UsersController@profileEdit');


Route::get('/search','UsersController@list');
Route::post('/searching','UsersController@search');


Route::post('/follow/{userId}', 'FollowsController@follow');
Route::post('/unfollow/{userId}', 'FollowsController@unfollow');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follow-list','PostsController@followPosts');

Route::get('/follower-list','FollowsController@followerList');
Route::get('/follower-list','PostsController@followerPosts');

Route::get('/user/{id}/profile','UsersController@userProfile');



});
