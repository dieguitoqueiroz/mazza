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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@index');
    Route::match(['get', 'post'], '/medicos/{action?}/{id?}', 'MedicosController@index')->middleware('pacientes');
    Route::match(['get', 'post'], '/agenda/{action?}/{id?}', 'AgendaController@index')->middleware('agenda');;
    Route::match(['get', 'post'], '/pacientes/{action?}/{id?}', 'PacientesController@index')->middleware('pacientes');
    Route::match(['get', 'post'], '/users/{action?}/{id?}', 'UsersController@index');
});

Auth::routes();

