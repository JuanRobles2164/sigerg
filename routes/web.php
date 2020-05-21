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

Route::get('/', function(){
    //return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/roles', 'Roles\RolesController@index')->name('roles');

Route::get('/admin', function(){
    return redirect()->route('admin.users_index');
})->name('admin');
Route::get('/admin/users', 'Admin\UsuariosController@index')->name('admin.users_index');
Route::post('/admin/users/create', 'Admin\UsuariosController@PostCrearUsuario')->name('admin.users_create');
Route::get('/admin/users/delete','Admin\UsuariosController@GetEliminarUsuario')->name('admin.users_delete');
