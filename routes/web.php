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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

// rutas privadas y solo accesible para usuarios autorizados mediante JWT
Route::group(['middleware' => ['jwt.verify']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
});

//RutasDispopnibles para usuarios segun el Rol
Route::group(['middleware' => ['role:Administrador']], function () {
    //rutas accesibles solo para usuario Admin
});

//RutasDispopnibles para usuarios segun el Rol Autor
Route::group(['middleware' => ['role:Autor']], function () {
    //rutas accesibles para usuario Admin
});

//RutasDispopnibles para usuarios segun el Rol Lector
Route::group(['middleware' => ['role:Lector']], function () {
    //rutas accesibles para usuario Lector
});