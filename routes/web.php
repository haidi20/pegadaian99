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
	Route::group(['prefix' => 'nasabah'], function(){
		Route::get('/', 'NasabahController@index')->name('nasabah.index');
	});
	Route::group(['prefix' => 'akad'], function(){
		Route::get('/', 'AkadController@index')->name('akad.index');
		Route::get('/create', 'AkadController@create')->name('akad.create');
		Route::post('/store', 'AkadController@store')->name('akad.store');
		Route::get('/edit/{id}', 'AkadController@edit')->name('akad.edit');
		Route::post('/update/{id}', 'AkadController@update')->name('akad.update');
		Route::post('/destroy/{id}', 'AkadController@destroy')->name('akad.destroy');
	});
	Route::group(['prefix' => 'cabang'], function(){
		Route::get('/', 'CabangController@index')->name('cabang.index');
		Route::get('/create', 'CabangController@create')->name('cabang.create');
		Route::get('/edit', 'CabangController@edit')->name('cabang.edit');
		Route::post('/store', 'CabangController@store')->name('cabang.store');
		Route::post('/update/{id}', 'CabangController@update')->name('cabang.update');

		Route::group(['prefix' => '/setting'], function(){
			Route::get('/', 'CabangController@index_setting')->name('cabang.setting');
			Route::post('/store', 'CabangController@store_setting')->name('cabang.setting.store');
		});
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
