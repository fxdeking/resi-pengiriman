<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\PengirimController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['prefix'=>'kantorpusat'], function(){
    Route::get('/', 'KantorController@index')->name('kan')->middleware('auth');
    Route::get('/input', 'KantorController@create')->name('inputkan')->middleware('auth');
    Route::post('/tambah', 'KantorController@store')->name('tambahkan')->middleware('auth');
    Route::get('/edit/{id}', 'KantorController@edit')->name('editkan')->middleware('auth');
    Route::post('/update/{id}', 'KantorController@update')->name('updatekan')->middleware('auth');
    Route::delete('/delete/{id}', 'KantorController@destroy')->name('deletekan')->middleware('auth');
});

Route::group(['prefix'=>'penerima'], function(){
    Route::get('/', 'PenerimaController@index')->name('pen')->middleware('auth');
    Route::get('/input', 'PenerimaController@create')->name('inputpen')->middleware('auth');
    Route::post('/tambah', 'PenerimaController@store')->name('tambahpen')->middleware('auth');
    Route::get('/edit/{id}', 'PenerimaController@edit')->name('editpen')->middleware('auth');
    Route::post('/update/{id}', 'PenerimaController@update')->name('updatepen')->middleware('auth');
    Route::delete('/delete/{id}', 'PenerimaController@destroy')->name('deletepen')->middleware('auth');
});

Route::group(['prefix'=>'pengirim'], function(){
    Route::get('/', 'PengirimController@index')->name('peng')->middleware('auth');
    Route::get('/input', 'PengirimController@create')->name('inputpeng')->middleware('auth');
    Route::post('/tambah', 'PengirimController@store')->name('tambahpeng')->middleware('auth');
    Route::get('/edit/{id}', 'PengirimController@edit')->name('editpeng')->middleware('auth');
    Route::post('/update/{id}', 'PengirimController@update')->name('updatepeng')->middleware('auth');
    Route::delete('/delete/{id}', 'PengirimController@destroy')->name('deletepeng')->middleware('auth');
});

Route::group(['prefix'=>'barang'], function(){
    Route::get('/', 'BarangController@index')->name('bar')->middleware('auth');
    Route::get('/input', 'BarangController@create')->name('inputbar')->middleware('auth');
    Route::post('/tambah', 'BarangController@store')->name('tambahbar')->middleware('auth');
    Route::get('/edit/{id}', 'BarangController@edit')->name('editbar')->middleware('auth');
    Route::post('/update/{id}', 'BarangController@update')->name('updatebar')->middleware('auth');
    Route::delete('/delete/{id}', 'BarangController@destroy')->name('deletebar')->middleware('auth');
});

Route::group(['prefix'=>'resipengiriman'], function(){
    Route::get('/', 'ResiController@index')->name('res')->middleware('auth');
    Route::get('/input', 'ResiController@create')->name('inputres')->middleware('auth');
    Route::post('/tambah', 'ResiController@store')->name('tambahres')->middleware('auth');
    Route::get('/detail/{id}', 'ResiController@show')->name('detailres')->middleware('auth');
    Route::get('/cetakresi/{id}', 'ResiController@cetakresi')->name('cetakres')->middleware('auth');
    Route::get('/cetak/{id}', 'ResiController@cetak')->name('ceres')->middleware('auth');
    Route::get('/edit/{id}', 'ResiController@edit')->name('editres')->middleware('auth');
    Route::post('/update/{id}', 'ResiController@update')->name('updateres')->middleware('auth');
    Route::delete('/delete/{id}', 'ResiController@destroy')->name('deleteres')->middleware('auth');
});
