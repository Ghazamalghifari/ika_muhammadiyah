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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index'); 
   

Route::group(['middleware'=>'web'],function(){
	Route::group(['prefix'=>'admin','middleware'=>['auth']], function () {

		Route::resource('angkatan','AngkatanController');
		Route::resource('keterangan_ika','KeteranganIkaController');
		Route::resource('ketua_angkatan','KetuaIkaController');
	});

});


Route::group(['middleware'=>'web'],function(){
	Route::group(['prefix'=>'data','middleware'=>['auth']], function () {

		Route::resource('alumni','AlumniController');
		Route::resource('event','EventController');
		Route::resource('daftar_event','DaftarEventController');

		Route::get('/filter/angkatan/{id}',[
		'middleware' => ['auth'],
		'as' => 'alumni.filter_angkatan',
		'uses' => 'AlumniController@filter_angkatan'
		] );

		Route::get('daftar/event/{id}',[
		'middleware' => ['auth'],
		'as' => 'event.daftar_event',
		'uses' => 'DaftarEventController@daftar_event'
		] );
	});

});