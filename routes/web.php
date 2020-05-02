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

Route::get('/', 'Usuario@getLogin')->name('getLogin');
Route::post('/login', 'Usuario@postLogin')->name('postLogin');


Route::get('/administrador', 'Administrador@getIndex')->name('administrador.getIndex');
Route::get('/administrador/usuarios', 'Administrador@getUsuariosIndex')->name('administrador.getUsuariosIndex');
