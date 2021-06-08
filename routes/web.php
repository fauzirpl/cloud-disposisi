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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'reset' => false]);

// Kelola Data Master Klasifikasi Surat
Route::resource('klasifikasi-surat', 'KlasifikasiSuratController')->except([
    'create', 'show'
]);

// Kelola Data Master Jabatan
Route::resource('jabatan', 'JabatanController')->except([
    'create', 'show'
]);

// Kelola Data Pengguna
Route::resource('pengguna', 'PenggunaController')->except([
    'show'
]);

// Kelola Data Surat Keluar
Route::resource('surat-keluar', 'SuratKeluarController');

// Kelola Data Surat Masuk
Route::resource('surat-masuk', 'SuratMasukController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/disposisi', 'HomeController@disposisi')->name('disposisi');
Route::post('/respon/{id}', 'HomeController@respon')->name('respon');
Route::get('/tracking-disposisi/{id}/user/{user}', 'HomeController@tracking');