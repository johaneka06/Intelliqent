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
    Route::get('/register', 'UserRegisterController@index');
    Route::post('/register', 'UserRegisterController@store');
    
    Route::get('/login', 'loginController@index')->name('login');
    Route::post('/login', 'loginController@authorizeLogin');
});


