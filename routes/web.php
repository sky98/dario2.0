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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','LoginController@login');
Route::post('/','LoginController@validations');

Route::prefix('administrator')->group(function(){

	Route::get('/','AdministratorController@main')->name('Panel');
	Route::get('employees','AdministratorController@employees')->name('employees');
	Route::get('employeeInformation/{id}','AdministratorController@employeeInformation')->name('employee Information');
	Route::get('changeState/{id}/{state}','AdministratorController@changeState');
	Route::get('employeeMovements/{id}','AdministratorController@employeeMovements')->name('employeeMovements');
	Route::get('employeeFees/{id}/{day}/{type}','AdministratorController@employeeFees');

	Route::get('customers','AdministratorController@customers')->name('customers');
	Route::get('customerDetails/{id}','AdministratorController@customerDetails')->name('customerDetails');
	Route::post('collection','AdministratorController@collection')->name('collection');
	Route::post('loans','AdministratorController@loans')->name('loans');
	Route::get('balances/{id}','AdministratorController@balanceDetails');

	Route::get('register','AdministratorController@register')->name('register');
	Route::post('register','AdministratorController@add');

	Route::get('personal','AdministratorController@personal')->name('personal');
	Route::get('updateNit/{id}/{nit}','AdministratorController@updateNit');
	Route::get('updateName/{id}/{name}','AdministratorController@updateName');
	Route::get('updateEmail/{id}/{email}','AdministratorController@updateEmail');
	Route::post('updatePassword','AdministratorController@updatePassword')->name('updatePassword');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
