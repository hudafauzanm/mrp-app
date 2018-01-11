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

Route::get('/', 'DashboardController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index');

// authentication
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// sdm
Route::get('/mrp', 'MRPController@index');

Route::get('/home', 'HomeController@index')->name('home');
