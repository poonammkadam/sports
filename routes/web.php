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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/registration', function () {
    return view('layouts.forms.registation');
});

Route::get('/payment','Controller@index');

Route::get('/home', 'HomeController@index')->name('home');


Route::group([ 'prefix' => 'admin', 'namespace'=>'Admin'], function() {
    Route::get('/', 'UserController@index');
    Route::get('/events', 'EventController@index');
    Route::get('/events/create', 'EventController@eventCreate');
    Route::post('/events/store', 'EventController@store');
    Route::get('/events/edit/{id}', 'EventController@edit');
    Route::post('/events/edit/{id}', 'EventController@update');

});
Route::group(['namespace'=>'User'], function() {
    Route::get('/registration', 'UserController@getRegister');
    Route::get('/myprofile', 'UserController@getProfile');
    Route::get('/events', 'UserController@eventList');
    Route::get('/event/register/{id}', 'UserController@eventCreate');
    Route::post('/profile/update', 'UserController@update');
    Route::post('/event/register', 'UserController@eventStore');
});
