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

Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('/registration', function () {
    return view('layouts.forms.registation');
});

Route::get('/payment','Controller@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'prefix' => 'admin', 'namespace'=>'Admin'], function() {
    Route::get('/', 'UserController@index');
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/store', 'UserController@create');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::get('/user/events/{id}', 'UserController@getParticipatedEvents');
    Route::post('/user/edit/{id}', 'UserController@update');


    Route::get('/events', 'EventController@index');
    Route::get('/events/create', 'EventController@eventCreate');
    Route::post('/events/store', 'EventController@store');
    Route::get('/events/edit/{id}', 'EventController@edit');
    Route::get('/events/view/{id}', 'EventController@view');
    Route::get('/events/paid/{id}', 'EventController@setPaymentStatus');
    Route::post('/events/edit/{id}', 'EventController@update');

});

Route::group(['namespace'=>'User'], function() {
    Route::get('/registration', 'UserController@getRegister');
    Route::get('/profile_update', 'UserController@getRegister');
    Route::get('/myprofile', 'UserController@getProfile');
    Route::get('/events', 'UserController@eventList');
    Route::get('/event/register/{id}', 'UserController@eventCreate');
    Route::post('/profile/update', 'UserController@update');
    Route::post('/event/register', 'UserController@eventStore');
    Route::get('/organiser', 'OragnationController@getRequestForm');
    Route::post('/oragnation/request', 'OragnationController@postOragnationStore');
});
