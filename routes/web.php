<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\Contact;

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

// Public
Auth::routes();

// Public connected
Route::get('/', 'HomeController@index')->name('index');
Route::get('/catalogue', 'HomeController@catalogue')->name('catalogue');
Route::get('/favoris', 'HomeController@favoris')->name('favoris');
Route::get('/mentions', 'HomeController@mentions')->name('mentions');
Route::get('/cgu', 'HomeController@cgu')->name('cgu');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', function (Request $request) {
    Mail::send(new Contact($request));
    return redirect('/');
});

// Account
Route::get('/account', 'AccountController@account')->name('account');

// API
Route::get('/api/movies', 'ApiTmdbController@movies');

// Admin
Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/user/{id}', 'AdminController@user');
