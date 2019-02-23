<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/home', 'HomeController@index');
Route::get('/dd', function () {
    return view('auth.login');
});
Route::resource('/', 'Auth\AuthController');
Route::auth();
Route::group(['middleware' => 'auth'], function () {

Route::resource('aveugle', 'AveugleController');
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
});
Route::get('/lost', function () {
    return view('lost');
});

Route::get('/resetpassword', function () {
    return view('user.resetpass');
});
Route::get('myprofile', 'UserController@profil');
Route::get('/email', function () {
    return view('emails.mail');
});
Route::get('/sms', function () {
    return view('sms.sms');
});
Route::get('error', function () {
    abord(404);
});
Route::get('notfound', function () {
    return view('404');
});

Route::get('/ok/{id}','AveugleController@ok');


Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);
Route::resource('/deleteallbox', 'MailController@deleteall');
Route::resource('maps', 'AveugleController@map');
Route::resource('mapsAll', 'AveugleController@mapAll');
Route::resource('maps1', 'AveugleController@map1');
Route::resource('mapsid', 'AveugleController@mapid');
Route::resource('mapidurgent', 'AveugleController@mapidurgent');
Route::resource('mapurgent', 'AveugleController@mapid');
Route::resource('not', 'AveugleController');
Route::resource('h', 'HomeController@getEmail');

Route::get('search', function () {
    return view('search');
});
Route::get('distance', function () {
    return view('distance');
});
Route::get('search1', 'UserController@index');



Route::get('/layout', 'Auth\AuthController@getLogout');



Route::get('/detailed', 'AveugleController@table_detailed');



Route::get('/contact','MailController@getContact');
Route::post('/contact','MailController@postContact');


Route::get('/contactsms','MailController@getSMS');
Route::post('/contactsms','MailController@postSMS');
// Route::resource('/sms', 'MailController@sms');



Route::get('/calendar', function () {
 return view('calendar');
});


Route::get('/getPDF','PDFController@getPDF');
Route::get('/download','PDFController@download_PDF');


Route::resource('/cc','CalendarController@index');
Route::get('/cal','AveugleController@calendar');
Route::get('/receive','MailController@getEmail');
Route::get('/inbox','MailController@getEmail');


//calendar
//Route::resource('calendrier','CalendarController');
//Route::get('/calendrier/{id}/edit', ['as' => 'fullcalendar', 'uses' => 'CalendarController@edit']);
Route::get('/home1', function () {
 return view('google');
});



Route::resource('/events', 'EventsController');
Route::get('/editcalendar/{id}','EventsController@modifier');

Route::get('delete','EventsController@destroy');
Route::get('/calender', function () {
    return view('fullcalendar');
});
Route::resource('vv', 'HomeController@index');

// for User Controller
Route::resource('/create', 'UserController@create');
Route::resource('/store', 'UserController@store');
Route::get('show_user','UserController@show');
Route::get('/User_edit/{id}','UserController@edit');
Route::get('/User_edit1/{id}','UserController@update');
Route::get('/User_delete/{id}','UserController@destroy');
Route::get('search','UserController@index');
Route::resource('/reset','UserController@postCredentials');

Route::get('/reset1', function () {
    return view('user.resetpass');
});

});


