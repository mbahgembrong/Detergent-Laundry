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
            Route::get('/create', 'UserController@create')->name('pengguna.create');
            Route::post('/', 'UserController@store')->name('pengguna.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('pengguna.edit');
            Route::post('/update/{id}', 'UserController@update')->name('pengguna.update');
            Route::post('/destroy/{id}', 'UserController@destroy')->name('pengguna.destroy');
        });
