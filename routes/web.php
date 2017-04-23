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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::resource('item','ItemController');
Route::resource('type','TypeController');
Route::resource('user','UserController');
Route::resource('customer','CustsomerController');
Route::resource('transaction','TransactionController');
Route::resource('itemin','ItemInController');
Route::resource('itemout','ItemOutController');

Route::get('transaction/getBill/{id}','TransactionController@getBill');