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

Auth::routes();
Route::get('/', 'Auth\LoginController@ShowLoginForm')->name('login')->middleware('guest');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/register', 'Auth\RegisterController@ShowRegistrationForm')->name('register')->middleware('guest');
Route::post('/register', 'RegisterController@store');

Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/user/{id}', 'AdminController@user');
