<?php

use Illuminate\Support\Facades\Auth;
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
/*Route::get("/", "IndexController@showIndex");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/user/{id}', 'UserController@profile')->name('user.profile');

Route::get('/edit/user/', 'UserController@edit')->name('user.edit');

Route::post('/edit/user/', 'UserController@update')->name('user.update');

Route::get('/edit/password/user/', 'UserController@passwordEdit')->name('password.edit');

Route::post('/edit/password/user/', 'UserController@passwordUpdate')->name('password.update');