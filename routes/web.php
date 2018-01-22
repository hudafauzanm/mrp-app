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

// status proses
Route::get('/status', 'StatusController@index');
Route::get('/status/detail/{reg_num}', 'StatusController@getDetails');

// form pengajuan mutasi (semua tipe)
Route::get('/mutasi/pengajuan', 'MutasiController@index');
Route::get('/mutasi/pengajuan/get_pegawai_info', 'MutasiController@getPegawaiInfo');
Route::post('/mutasi/pengajuan/submit_form', 'MutasiController@submitForm');
Route::get('/mutasi/pengajuan/getFormasi', 'MutasiController@getFormasi'); 
Route::get('/mutasi/pengajuan/getJabatan', 'MutasiController@getJabatan');

// sdm
Route::get('/mrp', 'MRPController@index');
Route::get('/mrp/edit/{reg_num}', 'MRPController@showEdit');
Route::post('/mrp/edit', 'MRPController@edit');
Route::get('/mrp/detail/{reg_num}', 'MRPController@showDetail');
Route::post('/mrp/datatables/ajax', 'MRPController@ajaxDatatables');
Route::get('/mrp/download/{reg_num}/{no_dokumen}', 'MRPController@downloadDokumen');

Route::get('/home', 'HomeController@index')->name('home');

//profil
Route::get('/profil','ProfilController@index');
Route::post('/profil/edit','ProfilController@input');
Route::get('/profil/getKota','ProfilController@getKota');

//evaluasi
Route::get('/dashboard/dataevaluasi', 'DashboardController@detail');
