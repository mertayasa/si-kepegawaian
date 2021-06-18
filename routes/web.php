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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'pegawai','as'=>'pegawai.'], function () {
        Route::get('/', 'PegawaiController@index')->name('index');
        Route::get('datatable', 'PegawaiController@datatable')->name('datatable');
        Route::get('tambah', 'PegawaiController@tambah')->name('tambah');
        Route::post('simpan', 'PegawaiController@simpan')->name('simpan');
        Route::delete('hapus/{id}', 'PegawaiController@delete')->name('hapus');
        Route::get('edit/{id}', 'PegawaiController@edit')->name('edit');
        Route::patch('update/{id}', 'PegawaiController@update')->name('update');
    });
});



