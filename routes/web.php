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

Route::namespace('Member')->name('member.')->group(function () {
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('/', 'AuthController@login');
    Route::post('register', 'AuthController@register')->name('register');
});
