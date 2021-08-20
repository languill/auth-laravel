<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::post('/login_form', 'HomeController@authenticate');

Route::get('/registration', function() {
    return view('registration');
})->name('registration');

Route::post('/registration_form', 'HomeController@registration');

Route::get('/logout', 'HomeController@logout');



Route::middleware('auth')->group(function() {
    Route::get('/private', 'AdminController@index')->name('private');

    Route::get('/create_user', 'AdminController@create_user')->name('create_user');

    Route::post('/create_user_form', 'AdminController@create_user_form')->name('create_user_form');

    Route::get('/user/{id}', 'AdminController@one_user')->name('user');

    Route::get('/edit/{id}', 'AdminController@edit')->name('edit');

    Route::post('/edit_form/{id}', 'AdminController@edit_form')->name('edit_form');

    Route::get('/security/{id}', 'AdminController@security')->name('security');

    Route::post('/security_form/{id}', 'AdminController@security_form')->name('security_form');

    Route::get('/status/{id}', 'AdminController@status')->name('status');

    Route::post('/status_form/{id}', 'AdminController@status_form')->name('status_form');

    Route::get('/avatar/{id}', 'AdminController@avatar')->name('avatar');

    Route::post('/avatar_form/{id}', 'AdminController@avatar_form')->name('avatar_form');

    Route::get('/delete/{id}', 'AdminController@delete')->name('delete');

});



