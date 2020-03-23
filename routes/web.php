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

Route::get('/', 'LoginController@create');
Route::get('/register', 'RegisterController@create');

Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/users/{page?}', 'AdminController@users');
Route::get('/admin/user/{id}', 'AdminController@user');
