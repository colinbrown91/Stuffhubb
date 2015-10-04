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

Route::get('/', 'WelcomeController@index');
Route::get('/about','AboutController@index');
Route::get('home', 'HomeController@index');
Route::get('/book', function()
	{
		return view('reservations/book');
	}); // test for reservation setup

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('user/getaccount/{user_id}', ['uses' => 'UserController@getAccount', 'as' => 'user.getaccount']);
Route::get('user/gethelp/{user_id}', ['uses' => 'UserController@getHelp', 'as' => 'user.gethelp']);
Route::get('user/getperformance/{user_id}', ['uses' => 'UserController@getPerformance', 'as' => 'user.getperformance']);
Route::get('user/getprofile/{user_id}', ['uses' => 'UserController@getProfile', 'as' => 'user.getprofile']);
Route::get('user/getsettings/{user_id}', ['uses' => 'UserController@getSettings', 'as' => 'user.getsettings']);
Route::get('user/gettransactions/{user_id}', ['uses' => 'UserController@getTransactions', 'as' => 'user.gettransactions']);
Route::resource('user.products','ProductController');
Route::resource('user','UserController');
Route::get('user/products/photos/getphoto/{photo_id}', ['uses' => 'PhotoController@getPhoto', 'as' => 'user.products.photos.getphoto']);
// Test route for ajax
// Route::post('products/photos/getphototest/{product_id}', ['uses' => 'PhotoController@getPhotoTest', 'as' => 'products.photos.getphototest']); 
Route::resource('user.products.photos', 'PhotoController');

Route::get('/db', function(){
	return DB::select('select database();');
});

Route::resource('search', 'SearchController');
Route::resource('user.reservations', 'ReservationController');

Route::post('products/calendar/setPriceForDayHour', ['uses' => 'ProductCalendarController@setPriceInDateRangeForProduct', 'as' => 'products.calendar.setPriceForDayHour']);
Route::resource('products.calendar', 'ProductCalendarController');