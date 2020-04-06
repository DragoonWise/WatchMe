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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/movie/{id}', ['uses' => 'HomeController@movie'])->name('movie.id');
Route::post('/search', 'HomeController@search');
Route::post('/', 'FavoriteController@add')->name('favorite');
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
Route::post('/account', 'AccountController@update');
Route::get('/subscription', 'AccountController@subscription')->name('subscription');
Route::get('/log', 'AccountController@log')->name('log');


// API
Route::get('/api/movies/populars/{page?}', 'ApiTmdbController@populars');
Route::get('/api/movies/similars/{imdb}', 'ApiTmdbController@similars');
Route::get('/api/movies/news/{page?}', 'ApiTmdbController@news');
Route::get('/api/movies/{page?}', 'ApiTmdbController@movies');
Route::get('/api/movie/{pc}/name/{name}/{page?}', 'ApiTmdbController@movieByName');
Route::get('/api/movie/{id}', 'ApiTmdbController@movieById');
Route::get('/api/movie/{id}/details', 'ApiTmdbController@movieDetails');
Route::get('/api/movie/{id}/videos', 'ApiTmdbController@movieVideos');

// Admin
Route::get('/admin', 'AdminController@dashboard')->middleware('role:admin');
Route::get('/admin/users', 'AdminController@users')->middleware('role:admin');
Route::post('/admin/user/activate', 'AdminController@useractivatetoggle')->middleware('role:admin');
Route::get('/admin/user/{id}', 'AdminController@user')->middleware('role:admin');
Route::post('/admin/user/{id}', 'AdminController@userupdate')->middleware('role:admin');
