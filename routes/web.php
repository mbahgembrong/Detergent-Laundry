<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\ Http\ Controllers\ HomeController::class, 'index' ]) ->name('home');

Route::prefix('kategori')->group(function() {
    Route::get('/', 'KategoriController@index')->name('kategori.index');
    Route::get('/create', 'KategoriController@create')->name('kategori.create');
    Route::post('/', 'KategoriController@store')->name('kategori.store');
    Route::get('/edit/{id}', 'KategoriController@edit')->name('kategori.edit');
    Route::post('/update/{id}', 'KategoriController@update')->name('kategori.update');
    Route::post('/destroy/{id}', 'KategoriController@destroy')->name('kategori.destroy');
});

Route::prefix('pengguna')->group(function() {
            Route::get('/', 'UserController@index')->name('pengguna.index');
            Route::get('/admin', 'UserController@admin')->name('pengguna.admin');
            Route::get('/karyawan', 'UserController@karyawan')->name('pengguna.karyawan');
            Route::get('/pelanggan', 'UserController@pelanggan')->name('pengguna.pelanggan');
            Route::get('/create', 'UserController@create')->name('pengguna.create');
            Route::post('/', 'UserController@store')->name('pengguna.store');
            Route::post('/create-ajax', 'UserController@storeAjax')->name('pengguna.storeAjax');
            Route::get('/edit/{id}', 'UserController@edit')->name('pengguna.edit');
            Route::post('/update/{id}', 'UserController@update')->name('pengguna.update');
            Route::post('/destroy/{id}', 'UserController@destroy')->name('pengguna.destroy');
        });
Route::prefix('transaksi')->group(function() {
            Route::get('/', 'TransaksiController@index')->name('transaksi.index');
            Route::get('/pesan', 'TransaksiController@pesan')->name('transaksi.pesan');
            Route::get('/jemput', 'TransaksiController@jemput')->name('transaksi.jemput');
            Route::get('/cuci', 'TransaksiController@cuci')->name('transaksi.cuci');
            Route::get('/setrika', 'TransaksiController@setrika')->name('transaksi.setrika');
            Route::get('/kirim', 'TransaksiController@kirim')->name('transaksi.setrika');
            Route::get('/create', 'TransaksiController@create')->name('transaksi.create');
            Route::post('/', 'TransaksiController@store')->name('transaksi.store');
            Route::get('/edit/{id}', 'TransaksiController@edit')->name('transaksi.edit');
            Route::get('/bayar/{id}', 'TransaksiController@bayar')->name('transaksi.bayar');
            Route::post('/update/{id}', 'TransaksiController@update')->name('transaksi.update');
            Route::post('/destroy/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
        });

Route::prefix('tracking')->group(function() {
            Route::get('/detail/{id}', 'TrackingController@detail')->name('tracking.detail');
            Route::get('/jemput/{id}', 'TrackingController@jemput')->name('tracking.jemput');
            Route::get('/cuci/{id}', 'TrackingController@cuci')->name('tracking.cuci');
            Route::get('/setrika/{id}', 'TrackingController@setrika')->name('tracking.setrika');
            Route::get('/kirim/{id}', 'TrackingController@kirim')->name('tracking.kirim');
        });
