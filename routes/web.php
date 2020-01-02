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


Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('channels', 'ChannelController');

Route::post('/channels/{channel}/subscriptions', 'SubscriptionController@store');

Route::delete('/channels/{channel}/subscriptions/{subscription}', 'SubscriptionController@destroy');

Route::get('/channels/{channel}/videos', 'UploadVideoController@index')->name('video.upload');

Route::post('/channels/{channel}/videos', 'UploadVideoController@store');


