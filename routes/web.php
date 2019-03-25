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
		Route::get('/tambah', 'CabangController@create')->name('cabang.create');
	});
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
