<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sucursales', 'HomeController@sucursales')->name('sucursales');
Route::get('/cartilla', 'HomeController@cartilla')->name('cartilla');

// Sucursales
	Route::get('/sucursal', 'SucursalController@index')->name('sucursal.index');
	Route::get('/sucursal/create', 'SucursalController@create')->name('sucursal.create');
	Route::post('/sucursal/store', 'SucursalController@store')->name('sucursal.store');
	Route::get('/sucursal/edit/{id}', 'SucursalController@edit')->name('sucursal.edit');
	Route::put('/sucursal/edit/{id}', 'SucursalController@update')->name('sucursal.update');
	Route::delete('/sucursal/delete/{id}', 'SucursalController@destroy')->name('sucursal.delete');

// Especialidades
	Route::get('/especialidad', 'EspecialidadController@index')->name('especialidad.index');
	Route::get('/especialidad/create', 'EspecialidadController@create')->name('especialidad.create');
	Route::post('/especialidad/store', 'EspecialidadController@store')->name('especialidad.store');
	Route::get('/especialidad/edit/{id}', 'EspecialidadController@edit')->name('especialidad.edit');
	Route::put('/especialidad/edit/{id}', 'EspecialidadController@update')->name('especialidad.update');
	Route::delete('/especialidad/delete/{id}', 'EspecialidadController@destroy')->name('especialidad.delete');

// Coberturas (Obras sociales y Planes)
	Route::get('/cobertura', 'CoberturaController@index')->name('cobertura.index');
	Route::get('/cobertura/create', 'CoberturaController@create')->name('cobertura.create');
	Route::get('/cobertura/store', 'CoberturaController@store')->name('cobertura.store');
	Route::get('/cobertura/edit/{id}', 'CoberturaController@edit')->name('cobertura.edit');

// Usuarios

// Tipo de orden 

// TABLA PIBOT entre [SUCURSAL, ESPECIALDAD] y SALA según sucursal
// Turnos	
