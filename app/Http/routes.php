<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::get('/', 'HomeController@index');

	Route::get('itemin/get_goods_detail','IteminController@getGoodsDetail');

	// route report
	Route::get('itemin/report','IteminController@report');
	Route::get('itemin/setReport','IteminController@setReport');

	Route::get('itemout/report','ItemoutController@report');
	Route::get('itemout/setReport','ItemoutController@setReport');

	Route::get('transaction/report','TransactionController@report');
	Route::get('transaction/setReport','TransactionController@setReport');

	Route::get('item/report','ItemsController@report');
	Route::get('item/setReport','ItemsController@setReport');

	Route::get('customer/report','CustomerController@report');
	Route::get('customer/setReport','CustomerController@setReport');

	Route::get('transaction/getBill/{id}','TransactionController@getBill');


	Route::resource('user','UserController');
	Route::resource('type','TypeController');
	Route::resource('customer','CustomerController');
	Route::resource('item','ItemsController');
	Route::resource('itemin','IteminController');
	Route::resource('itemout','ItemOutController');
	Route::resource('transaction','TransactionController');
	Route::resource('price','PriceController');

	

	Route::get('auth/login', 'Auth\AuthController@getLogin');
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', 'Auth\AuthController@getLogout');
	// Registration routes...
	Route::get('auth/register', 'Auth\AuthController@getRegister');
	Route::post('auth/register', 'Auth\AuthController@postRegister');

});
