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
use App\User;
use App\Gender;

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/login', 'HomeController@login_form')->name('login');

Route::post('/login_form', 'HomeController@authenticate');

Route::get('/registration', 'HomeController@registration_form')->name('registration');

Route::post('/registration_form', 'HomeController@registration')->name('registration_form');

Route::get('/logout', 'HomeController@logout')->name('logout');



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

    Route::get('/socials/{id}', 'AdminController@socials')->name('socials');

    Route::post('/social_form/{id}', 'AdminController@social_form')->name('social_form');

    Route::get('/delete/{id}', 'AdminController@delete')->name('delete');

    Route::post('/private', 'AdminController@search')->name('search');

});



