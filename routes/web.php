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

Route::get('/',function(){
  return redirect()->route('login');
  // return view('dashboard');
});

Route::middleware('auth')->group(function() {
	Route::group(['prefix' => 'akad'], function(){
		Route::get('/', 'AkadController@index')->name('akad.index');
		Route::get('/create', 'AkadController@create')->name('akad.create');
		Route::get('/edit/{id}', 'AkadController@edit')->name('akad.edit');

		Route::post('/store', 'AkadController@store')->name('akad.store');
		Route::post('/update/{id}', 'AkadController@update')->name('akad.update');
		Route::post('/destroy/{id}', 'AkadController@destroy')->name('akad.destroy');
	});
	Route::group(['prefix' => 'cabang'], function(){
		Route::get('/', 'CabangController@index')->name('cabang.index');
		Route::get('/edit', 'CabangController@edit')->name('cabang.edit');
		Route::get('/create', 'CabangController@create')->name('cabang.create');

		Route::post('/store', 'CabangController@store')->name('cabang.store');
		Route::post('/update/{id}', 'CabangController@update')->name('cabang.update');
	});
	Route::group(['prefix' => 'nasabah'], function(){
		Route::get('/', 'NasabahController@index')->name('nasabah.index');
		Route::get('/edit/{id}', 'NasabahController@edit')->name('nasabah.edit');
		Route::get('/detail/{id}', 'NasabahController@detail')->name('nasabah.detail');

		Route::post('/update/{id}', 'NasabahController@update')->name('nasabah.update');
	});
	Route::group(['prefix' => 'operasional'], function(){
		Route::get('/create', 'OperasionalController@create')->name('operasional.create');
		Route::get('/bku-admin', 'OperasionalController@bku')->name('operasional.bku');
		Route::get('/data-pengeluaran', 'OperasionalController@pengeluaran')->name('operasional.pengeluaran');
		Route::get('/change-status/{id}', 'OperasionalController@change_status')->name('operasional.change-status');
		Route::get('/hutang-dan-pembayaran', 'OperasionalController@hutang')->name('operasional.hutang');

		Route::post('/store', 'OperasionalController@store')->name('operasional.store');
		Route::post('/hutang/store', 'OperasionalController@hutang_store')->name('operasional.hutang.store');
	});
	Route::group(['prefix' => 'pembayaran'], function(){
		Route::get('/bku', 'PembayaranController@bku')->name('pembayaran.bku');
		Route::get('/pendapatan', 'PembayaranController@pembayaran')->name('pembayaran.pendapatan');
	});
	Route::group(['prefix' => 'permodalan'], function(){
		// url create for 'tambah saldo' & 'refund saldo'
		Route::get('/penambahan-saldo', 'PermodalanController@penambahan')->name('permodalan.penambahan');
		Route::get('/hutang-dan-piutang', 'PermodalanController@hutang')->name('permodalan.hutang');
		Route::get('/create/tambah-saldo', 'PermodalanController@create')->name('permodalan.create.tambah-saldo');
		Route::get('/create/refund-saldo', 'PermodalanController@create')->name('permodalan.create.refund-saldo');
		Route::get('/list-data-refund-saldo', 'PermodalanController@list_refund')->name('permodalan.list.refund');
		Route::get('/change-status/{id}/{code}', 'PermodalanController@change_status')->name('permodalan.change_status');

		Route::post('/store', 'PermodalanController@store')->name('permodalan.store');
	});
	Route::group(['prefix' => 'setting'], function(){
		Route::get('/', 'SettingController@index')->name('setting.index');
		Route::get('/store', 'SettingController@store')->name('setting.store');
		Route::get('/cabang', 'SettingController@pilih_cabang')->name('setting.pilih-cabang');
		Route::get('/data-login', 'SettingController@login')->name('setting.login');
		Route::get('/update/{id}', 'SettingController@update')->name('setting.update');
		Route::get('/delete/{id}', 'SettingController@delete')->name('setting.delete');
		Route::get('/validate-data', 'SettingController@validate_data')->name('setting.validate_data');
		
		Route::post('/cabang/store', 'SettingController@pilih_cabang_store')->name('setting.pilih-cabang.store');
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('/', 'UserController@index')->name('user.index');
		Route::get('/create', 'UserController@create')->name('user.create');
		Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');

		Route::post('/store', 'UserController@store')->name('user.store');
		Route::post('/update/{id}', 'UserController@update')->name('user.update');
		Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	});
});

Route::get('/api', 'CabangController@api');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('auth')->group(function(){
	Route::get('/refresh-captcha', 'LoginController@refresh_captcha');
});

