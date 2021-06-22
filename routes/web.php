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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::group(['prefix' => 'pegawai','as'=>'pegawai.', 'middleware' => 'role:admin'], function () {
        Route::get('/', 'PegawaiController@index')->name('index');
        Route::get('datatable', 'PegawaiController@datatable')->name('datatable');
        Route::get('tambah', 'PegawaiController@tambah')->name('tambah');
        Route::post('simpan', 'PegawaiController@simpan')->name('simpan');
        Route::delete('hapus/{pegawai}', 'PegawaiController@destroy')->name('hapus');
        Route::get('edit/{pegawai}', 'PegawaiController@edit')->name('edit');
        Route::patch('update/{pegawai}', 'PegawaiController@update')->name('update');
    });

    Route::group(['prefix' => 'surat','as'=>'surat.'], function () {
        Route::get('/', 'SuratController@index')->name('index');
        Route::get('datatable', 'SuratController@datatable')->name('datatable');
        
        Route::get('create', 'SuratController@create')->name('create');
        Route::post('store', 'SuratController@store')->name('store');
        Route::get('edit/{surat}', 'SuratController@edit')->name('edit');
        Route::patch('update/{surat}', 'SuratController@update')->name('update');
        Route::delete('destroy/{surat}', 'SuratController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'sakit','as'=>'sakit.'], function () {
        Route::get('/', 'SakitController@index')->name('index');
        Route::get('datatable', 'SakitController@datatable')->name('datatable');

        Route::middleware(['role:pegawai'])->group(function () {
            Route::get('create', 'SakitController@create')->name('create');
            Route::post('store', 'SakitController@store')->name('store');
            Route::delete('destroy/{surat}', 'SakitController@destroy')->name('destroy');
            Route::get('edit/{surat}', 'SakitController@edit')->name('edit');
            Route::patch('update/{surat}', 'SakitController@update')->name('update');
        });

    });

    Route::group(['prefix' => 'cuti','as'=>'cuti.'], function () {
        Route::get('/', 'CutiController@index')->name('index');
        Route::get('datatable', 'CutiController@datatable')->name('datatable');

        Route::middleware(['role:pegawai'])->group(function () {
            Route::get('create', 'CutiController@create')->name('create');
            Route::post('store', 'CutiController@store')->name('store');
            Route::delete('destroy/{cuti}', 'CutiController@destroy')->name('destroy');
            Route::get('edit/{cuti}', 'CutiController@edit')->name('edit');
            Route::patch('update/{cuti}', 'CutiController@update')->name('update');
        });
    });

});



