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

Route::get('/registration', function () {
    return view('layouts.forms.registation');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'prefix' => 'admin', 'namespace'=>'Admin'], function() {
    Route::get('/', 'UserController@index');
    Route::get('/events', 'EventController@index');
    Route::get('/events/store', 'EventController@store');

});
Route::group(['namespace'=>'User'], function() {
    Route::get('/registration', 'UserController@index');
    Route::post('/profile/update', 'UserController@update');
    Route::post('/event/store', 'UserController@eventStore');
});
