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

Route::get('/', 'GuestController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//
Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

//

Route::get('/request-register-form', 'RequestRegisterController@showRequestRegistrationForm')->name('requestRegisterForm');
Route::post('/guardar', 'RequestRegisterController@registerInRegisterUsers')->name('registerInRegisterUsers');
Route::post('/request-register', 'RequestRegisterController@store')->name('requestRegisterStore');


