<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();


Route::get('/pegawai', 'PegawaiController@index')->name('pegawai');
Route::get('/pegawai/tambah', 'TambahPegawaiController@index')->name('tambah_pegawai');
Route::post('pegawai/simpan', 'TambahPegawaiController@simpan')->name('simpan_pegawai');
Route::delete('pegawai/{id}', 'PegawaiController@delete');
Route::get('pegawai/{id}/edit', 'PegawaiController@edit')->name('edit_pegawai');
Route::patch('pegawai/{id}', 'PegawaiController@update')->name('update_pegawai');



