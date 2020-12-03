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

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/category/manage/', 'CategoryController@index');
    Route::post('/category/create', 'CategoryController@store');
    Route::get('/category/{id}/delete', 'CategoryController@destroy');

    Route::post('/course/create', 'CourseController@store');
    Route::post('/course/{id}/update', 'CourseController@update');
    Route::get('/course/{id}/update', 'CourseController@show');
    
    Route::post('/topic/{id}/create/', 'TopicController@store');
    Route::post('/topic/{material_id}/update/{topic_id}', 'TopicController@update');
    Route::get('/topic/{id}/view', 'TopicController@index');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/register/preferences', 'UserController@create');
    Route::post('/register/preferences', 'UserController@save');
    Route::get('/logout', 'UserController@logout');

    Route::get('/course/search/', 'ContentController@search');
    Route::get('/course/filter/category/', 'ContentController@find');
    Route::get('/course/all', 'ContentController@index');
    Route::get('/course', 'ContentController@create');
    Route::get('/course/{material_id}/{topic_id}', 'ContentController@topic');
    Route::get('/course/{id}', 'ContentController@show');

    Route::get('/forum/search', 'ForumController@search');
    Route::post('/forum/newThread', 'ForumController@store');
    Route::get('forum/filter/{id}', 'ForumController@create');
    Route::get('/forum/thread/{id}', 'ForumController@show');
    Route::post('/forum/thread/{id}/reply', 'ForumController@reply');
    Route::get('/forum', 'ForumController@index');

    Route::post('/member/profile/password', 'ProfileController@edit');
    Route::post('/member/profile/{id}', 'ProfileController@update');
    Route::get('/member', 'ProfileController@index');
    Route::get('/member/profile', 'ProfileController@create');

    Route::post('/preferences/update', 'UserController@edit');
    Route::get('/preferences/update', 'UserController@display');
    
});

