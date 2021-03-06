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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/index', 'HomeController@index')->name('home');
    Route::get('/notify', 'NotificationController@index')->name('notify');
    Route::get('/notification/get', 'NotificationController@get')->name('notification.get');
    Route::post('/notification/read', 'NotificationController@read')->name('notification.read');

});

