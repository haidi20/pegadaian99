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

		Route::group(['prefix' => '/setting'], function(){
			Route::get('/', 'CabangController@index_setting')->name('cabang.setting');
			Route::post('/store', 'CabangController@store_setting')->name('cabang.setting.store');
		});
	});
	Route::group(['prefix' => 'nasabah'], function(){
		Route::get('/', 'NasabahController@index')->name('nasabah.index');
		Route::get('/edit/{id}', 'NasabahController@edit')->name('nasabah.edit');
		Route::get('/detail/{id}', 'NasabahController@detail')->name('nasabah.detail');

		Route::post('/update/{id}', 'NasabahController@update')->name('nasabah.update');
	});
	Route::group(['prefix' => 'operasional'], function(){
		Route::get('/create', 'OperasionalController@create')->name('operasional.create');
		Route::get('/bku-admin', 'OperasionaController@bku')->name('operasional.bku');
		Route::get('/data-pengeluaran', 'OperasionalController@pengeluaran')->name('operasional.pengeluaran');
		Route::get('/hutang-dan-pembayaran', 'OperasionalController@hutang')->name('operasional.hutang');
	});
	Route::group(['prefix' => 'pembayaran'], function(){
		Route::get('/bku', 'PembayaranController@bku')->name('pembayaran.bku');
		Route::get('/pendapatan', 'PembayaranController@pembayaran')->name('pembayaran.pendapatan');
	});
	Route::group(['prefix' => 'permodalan'], function(){
		Route::get('/create', 'PermodalanController@create')->name('permodalan.create');
		Route::get('/refund-saldo', 'PermodalanController@refund')->name('permodalan.refund');
		Route::get('/penambahan-saldo', 'PermodalanController@penambahan')->name('permodalan.penambahan');
		Route::get('/hutang-dan-piutang', 'PermodalanController@hutang')->name('permodalan.hutang');
		Route::get('/list-data-refund-saldo', 'PermodalanController@list_refund')->name('permodalan.list.refund');

		Route::post('/store', 'PermodalanController@store')->name('permodalan.store');
	});
});

Route::get('/api', 'CabangController@api');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
