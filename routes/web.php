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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
