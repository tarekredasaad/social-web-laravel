<?php

use Illuminate\Support\Facades\Route;

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

Route::get('chat', function () {
    return view('livewire.chat');
});

define('PAGINATION_COUNT',3);
Route::get('/', function () {
    return view('login');
});

// Route::get('home', [ 'as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@home'])->name('home');
// });

Route::get('signup', function () {
    return view('signup');
});

Route::get('profile', function () {
    return view('profile')->middleware('verified');
});

Route::get('profile','App\Http\Controllers\PostController@index');

Route::get('profiles','App\Http\Controllers\ProfileController@red');

Route::get('change_profile/{id}','App\Http\Controllers\ProfileController@index');

Route::post('check_login','App\Http\Controllers\HomeController@check_login');

Route::post('post/{id}','App\Http\Controllers\PostController@post');

Route::resource('post','App\Http\Controllers\PostsController');

Route::get('home','App\Http\Controllers\HomeController@home');
 Route::post('update_profile/{id}','App\Http\Controllers\ProfileController@update_profile');

Route::get('messenger','App\Http\Controllers\MassengerController@index');

Route::get('messageuser/{userid}','App\Http\Controllers\MassengerController@create');

Route::post('send/{id}/{userid}','App\Http\Controllers\MassengerController@store');

Route::post('signups','App\Http\Controllers\HomeController@signup');

Route::get('likes/{postid}/{user}/{useridp}','App\Http\Controllers\LikeController@create');

Route::get('notification','App\Http\Controllers\NotificationController@index');

Route::post('comment/{postid}/{user}/{useridp}','App\Http\Controllers\CommentController@store');

Route::get('friend_request/{id}/{userid}','App\Http\Controllers\FriendController@store');

Route::get('friend_reject/{userid}/{id}','App\Http\Controllers\FriendController@destroy');

Route::get('friend_Accept/{userid}/{id}','App\Http\Controllers\FriendController@accept');

Route::get('friend_reject/{userid}/{id}','App\Http\Controllers\FriendController@destroy');
