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
	Route::group(['prefix' => 'cabang'], function(){
		Route::get('/', 'CabangController@index')->name('cabang.index');
		Route::get('/create', 'CabangController@create')->name('cabang.create');
		Route::post('/store', 'CabangController@store')->name('cabang.store');

		Route::group(['prefix' => '/setting'], function(){
			Route::get('/', 'CabangController@index_setting')->name('cabang.setting.index');
			Route::post('/store', 'CabangController@store_setting')->name('cabang.setting.store');
		});
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
