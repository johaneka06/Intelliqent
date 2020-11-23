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

Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'PageController@index')->name('home');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', 'UserController@index');
    Route::post('/register', 'UserController@store');
    Route::get('/login', 'loginController@index')->name('login');
    Route::post('/login', 'loginController@authorizeLogin');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/register/preferences', 'UserController@create');
    Route::post('/register/preferences', 'UserController@save');
    Route::get('/member', 'UserController@show');
    Route::get('/logout', 'UserController@logout');
    Route::get('/course/filter/category/', 'ContentController@find');
    Route::get('/course', 'ContentController@index');
    Route::get('/course/{id}', 'ContentController@show');
    
});

