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

Route::get('/', 'PageController@index')->name('home');
Route::post('antri/{id}', 'PageController@antri')->name('antri');
Route::post('proses/{id}', 'PageController@antri')->name('proses');
Route::post('memilih/{calon}/{mhs}', 'PageController@memilih')->name('memilih');

Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/', 'PageController@dashboard')->name('dashboard');
	Route::resource('calons', 'CalonController');
	Route::resource('mhs', 'MhsController');
});

Route::get('test/{first}/{second}', function (\Illuminate\Http\Request $request, $first, $second) {
	dd($request->all(), $first, $second);
});

