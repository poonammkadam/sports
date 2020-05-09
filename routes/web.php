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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('/registration', function() {
    return view('layouts.forms.registation');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => [ 'auth' ] ], function() {
    Route::get('/', 'UserController@index');
    Route::get('/user', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/store', 'UserController@store');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::get('/user/events/{id}', 'UserController@getParticipatedEvents');
    Route::post('/user/update/{id}', 'UserController@update');
    Route::get('/organisation', 'OrganisationController@index');
    Route::get('/organisation/create', 'OrganisationController@create');
    Route::post('/organisation/store', 'OrganisationController@store');
    Route::get('/organisation/edit/{id}', 'OrganisationController@edit');
    Route::get('/organisation/view/{id}', 'OrganisationController@show');
    Route::post('/organisation/update/{id}', 'OrganisationController@update');
    Route::get('/events', 'EventController@index');
    Route::get('/events/create', 'EventController@eventCreate');
    Route::post('/events/store', 'EventController@store');
    Route::get('/events/edit/{id}', 'EventController@edit');
    Route::get('/events/view/{id}', 'EventController@view');
    Route::get('/events/paid/{id}', 'EventController@setPaymentStatus');
    Route::post('/events/edit/{id}', 'EventController@update');
    Route::get('/resulte/edit/{id}', 'EventController@getResulte');
    Route::post('/resulte/upload/{id}', 'EventController@postResulte');
    Route::get('/user/event/category/{id}', 'EventController@getUserCategory');
    Route::get('/setting', 'SiteSettingController@create');
});
Route::group([ 'namespace' => 'User' ], function() {
    Route::get('/registration', 'UserController@getRegister');
    Route::get('/profile_update', 'UserController@getRegister');
    //    Route::get('/{result}', 'UserController@getRegister')->where(['result' => '\b(aspx)\b+']);;
    Route::get('/myprofile', 'UserController@getProfile');
    Route::get('/events', 'UserController@eventList');
    Route::get('/organisation_events/{id}', 'UserController@organisationEventList');
    Route::get('/event/register/{id}', 'UserController@eventCreate');
    Route::post('/event/register', 'UserController@eventStore');
    Route::post('/event/register/store', 'UserController@eventStore');
    Route::get('/event/{id}/{org}', 'EventController@getOrgShow');
    Route::get('/event/{id}', 'EventController@getShow');
    Route::get('/org/participants/list/{id}/{catid}', 'EventController@getOrgPartiList');
    Route::post('/profile/update', 'UserController@update');
    Route::get('/myresult', 'UserController@getUserResult');
    Route::get('/upload/receipt/{id}', 'EventController@uploadReceipt');
    Route::post('event/receipt/upload/{id}', 'EventController@postUploadReceipt');
    Route::get('event/participant/receipt/{id}', 'EventController@getReceipt');
    Route::post('ckeditor/upload', 'EventController@upload')->name('ckeditor.upload');
    // result
    Route::get('/results', 'EventController@getAllResults');
    Route::get('/StartPage.aspx', 'EventController@getFromResult');
    Route::get('/results.aspx', 'EventController@getResult');
    Route::get('/Stats.aspx', 'EventController@getStats');
    Route::get('/logout', function() {
        Auth::logout();

        return redirect('/login');
    });
    Route::get('/thankyou', function() {
        return view('thankyou');
    });
});
Route::group([ 'namespace' => 'User', 'prefix' => 'organisation', ], function() {
    Route::get('/', 'OrganisationController@getRequestForm');
    Route::get('/myorganisation', 'OrganisationController@show');
    Route::get('/organisation/view', 'OrganisationController@show');
    Route::post('/oragnation/request', 'OrganisationController@postOraganisationStore');
    Route::get('/event/view/{id}', 'OrganisationController@getShow');
});
Route::get('/privacy', 'Controller@privacy');
Route::get('/about-us', 'Controller@about');
Route::get('/terms', 'Controller@terms');
