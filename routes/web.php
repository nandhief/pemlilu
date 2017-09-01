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
	Route::get('logs', 'LogController@index')->name('log');
	Route::resource('calons', 'CalonController');
	Route::resource('mhs', 'MhsController');
	Route::resource('users', 'UsersController');
	Route::resource('roles', 'RolesController');
	Route::resource('settings', 'SettingController', ['only' => ['index', 'edit', 'update']]);
});

Route::get('dump', function () {
	$no = 1;
	foreach (App\Mahasiswa::select('id', 'nim', 'name', 'fakultas')->whereNull('kode')->get()->toArray() as $r) {
		$r['no'] = $no++;
		$r['action'] = "<form method='POST' action='http://pemilu.dev/antri/". $r['id'] ."' accept-charset='UTF-8'><input name='_token' type='hidden' value='". csrf_token() ."'> <input class='btn btn-xs btn-info' type='submit' value='Antri'> </form> ";
		$mhs[] = (object) $r;
	}
	$data = collect($mhs);
	if (request()->ajax()) {
		// return Datatables::of($data)->make(true);
		return response()->json(compact('data'));
	}
	$f = Faker\Factory::create('id_ID');
	foreach (range(1, 7500) as $r) {
		$data = collect([(object)['nim' => 'B', 'fakultas' => 'EKONOMI'], (object)['nim' => 'C', 'fakultas' => 'TEKNIK'], (object)['nim' => 'D', 'fakultas' => 'PERTANIAN'], (object)['nim' => 'E', 'fakultas' => 'HUKUM'], (object)['nim' => 'F', 'fakultas' => 'PSIKOLOG'], (object)['nim' => 'G', 'fakultas' => 'TIK']]);
		$kd = collect(['211', '131', '111', '311', '121']);
		$fk = $data->random();
		$nim = $fk->nim . '.' . $kd->random() . '.' . rand(13,16) . '.' . substr('0000'. rand(1,100), -4);
		$name = $f->firstName . ' ' . $f->lastName;
		do {
			$nimf = $nim;
			if (count(App\Mahasiswa::whereNim($nim)->first()) >= 1) {
				$fk = $data->random();
				$nim = $fk->nim . '.' . $kd->random() . '.' . rand(13,16) . '.' . substr('0000'. rand(1,200), -4);
				dump("Ganti $nimf ke $nim");
			}
		} while (count(App\Mahasiswa::whereNim($nim)->first()) >= 1);
		dump($nim, $name);
		App\Mahasiswa::create(['name' => $name, 'nim' => $nim, 'fakultas' => $fk->fakultas]);
	}
})->name('datatables.data');
Route::get('data', function () {
	return view('datatable');
});

