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

Route::get('/sucursal', 'SucursalController@index')->name('sucursal.index');
Route::get('/sucursal/create', 'SucursalController@create')->name('sucursal.create');
Route::post('/sucursal/store', 'SucursalController@store')->name('sucursal.store');
Route::get('/sucursal/edit/{id}', 'SucursalController@edit')->name('sucursal.edit');
Route::put('/sucursal/edit/{id}', 'SucursalController@update')->name('sucursal.update');