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

// ROUTES KLO UDAH LOGIN
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('allBarang');
Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['middleware' => 'RoleAdmin'], function () {
        Route::get('barang', 'BarangController@index')->name('indexBarang');
        Route::post('barang', 'BarangController@store')->name('storeBarang');
        Route::get('barang/{id}/edit', 'BarangController@edit')->name('editBarang');
        Route::put('barang/{id}', 'BarangController@update')->name('updateBarang');
        Route::delete('barang/{id}', 'BarangController@destroy')->name('deleteBarang');
    });

    Route::get('barang/{id}', 'BarangController@show')->name('showBarang');
});

Route::group(['middleware' => 'RoleAdmin'], function () {
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['middleware' => 'RoleAdmin'], function () {
        Route::put('pesanan/{id}', 'PesananController@accept')->name('terimaPesanan');
    });
    Route::group(['middleware' => 'RoleMember'], function () {
        Route::post('pesanan', 'PesananController@pesan')->name('pesanBarang');
    });

    Route::get('pesanan', 'PesananController@index')->name('indexPesanan');
});

Route::get('/learn', function() {
    return view('learn');
});