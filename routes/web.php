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
Route::get('sessionOut','LoginController@sessionOut');

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

	Route::get('statistics','AdministratorController@statistics')->name('statistics');
	Route::get('movementsDay/{date}','AdministratorController@movementsDay');
	Route::get('allLoansDay/{date}','AdministratorController@allLoansDay');
	Route::get('allReceivablesDay/{date}','AdministratorController@allReceivablesDay');
});

Route::prefix('employee')->group(function(){
	Route::get('/','EmployeeController@main')->name('panel');
	Route::get('customer/{id}','EmployeeController@customer')->name('customer');
	Route::get('balances/{id}','EmployeeController@balances');
	Route::post('pay','EmployeeController@pay')->name('pay');
	Route::post('lend','EmployeeController@lend')->name('lend');
	Route::get('newCustomer','EmployeeController@newCustomer')->name('newCustomer');
	Route::post('newCustomer','EmployeeController@addCustomer');

	Route::get('personal','EmployeeController@personal')->name('personal');
	Route::get('updateNit/{id}/{nit}','EmployeeController@updateNit');
	Route::get('updateName/{id}/{name}','EmployeeController@updateName');
	Route::get('updateEmail/{id}/{email}','EmployeeController@updateEmail');
	Route::post('updatePassword','EmployeeController@updatePassword')->name('updatePassword');

	Route::get('statistics','EmployeeController@statistics')->name('statistics');
	Route::get('movementsDay/{id}/{date}','EmployeeController@movementsDay');
	Route::get('allLoansDay/{id}/{date}','EmployeeController@allLoansDay');
	Route::get('allReceivablesDay/{id}/{date}','EmployeeController@allReceivablesDay');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
