<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login','Api\LoginController@login');


Route::group([ 'prefix' => 'sup','middleware' => 'auth:api' ],function() {
	Route::get('/',function(){
		return "Sup";
	});
});


Route::prefix('adm')->middleware('auth:api')->group(function() {
	Route::get('customerList',function(){
		return "Admin Get";
	});
});

Route::prefix('emp')->middleware('auth:api')->group(function() {

	Route::get('customerList','Api\CustomerController@all');
	Route::get('customerDetails/{id}','Api\CustomerController@customerDetails');
	Route::get('customerMovements/{id}','Api\CustomerController@customerMovements');

	Route::post('lend','Api\CustomerController@lend');
	Route::post('pay','Api\CustomerController@pay');
});

Route::prefix('v1')->middleware('auth:api')->group(function(){
});