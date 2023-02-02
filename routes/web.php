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

Route::group(['prefix'=>'resipengiriman'], function(){
    Route::get('/', 'ResiController@index')->name('res')->middleware('auth');
    Route::get('/input', 'ResiController@create')->name('inputres')->middleware('auth');
    Route::post('/tambah', 'ResiController@store')->name('tambahres')->middleware('auth');
    Route::get('/edit/{id}', 'ResiController@edit')->name('editres')->middleware('auth');
    Route::post('/update/{id}', 'ResiController@update')->name('updateres')->middleware('auth');
    Route::delete('/delete/{id}', 'ResiController@destroy')->name('deleteres')->middleware('auth');
});
