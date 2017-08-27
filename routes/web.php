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
Route::get('antrian', 'PageController@antrian')->name('antrian');
Route::post('antri/{id}', 'PageController@antri')->name('antri');
Route::post('proses/{id}', 'PageController@proses')->name('proses');
Route::post('memilih/{calon}/{mhs}', 'PageController@memilih')->name('memilih');
Route::post('golput', 'PageController@golput')->name('golput');
Route::get('count', 'PageController@count')->name('count');

/**
 * Login
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
	Route::get('/', 'PageController@dashboard')->name('dashboard');
	Route::get('quick-count', 'PageController@quick')->name('quick');
	Route::resource('calons', 'CalonController');
	Route::resource('mhs', 'MhsController');
	Route::resource('users', 'UsersController');
	Route::resource('roles', 'RolesController');
	Route::resource('settings', 'SettingController', ['only' => ['index', 'edit', 'update']]);
});

Route::get('dump', function () {
	// $mhs = App\Mahasiswa::get();
	// return view('count', compact('mhs'));
	$f = Faker\Factory::create('id_ID');
	foreach (range(1, 500) as $r) {
		$fk = collect([(object)['nim' => 'E', 'fakultas' => 'HUKUM'], (object)['nim' => 'B', 'fakultas' => 'EKONOMI'], (object)['nim' => 'C', 'fakultas' => 'TEKNIK'], (object)['nim' => 'D', 'fakultas' => 'PERTANIAN'], (object)['nim' => 'E', 'fakultas' => 'HUKUM'], (object)['nim' => 'F', 'fakultas' => 'PSIKOLOG'], (object)['nim' => 'G', 'fakultas' => 'TIK']])->random();
		$nim = $fk->nim . '.' . collect(['211', '131', '111'])->random() . '.' . rand(13,16) . '.' . substr('0000'. rand(1,100), -4);
		$name = $f->firstName . ' ' . $f->lastName;
		do {
			$nim = count(App\Mahasiswa::whereNim($nim)->first()) >= 1 ? 'E.' . collect(['211', '131', '111'])->random() . '.' . rand(13,16) . '.' . substr('0000'. rand(1,100), -4) : $nim;
		} while (count(App\Mahasiswa::whereNim($nim)->first()) >= 1);
		dump($nim, $name);
		App\Mahasiswa::create(['name' => $name, 'nim' => $nim, 'fakultas' => $fk->fakultas]);
	}
});

