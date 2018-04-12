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
Route::get('/', 'UserIndexController@index');
Route::get('event', 'UserIndexController@event');

Route::group(['prefix'=>'users', 'middleware'=>['auth', 'role:member']], function(){
  Route::get('detailevent', 'UserIndexController@detailevent');
  Route::get('/', 'UserIndexController@myevent');
  Route::get('{id}/detailevent', 'UserIndexController@detailevent');
  route::post('{id}/daftar', 'UserIndexController@daftar');
  route::post('{id}', 'UserIndexController@destroy');
});


Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function(){
  route::get('/', function(){
    return view('admin.dashboard');
  });
  route::get('/logout', 'UsersController@logout');

  route::group(['prefix'=>'event'], function(){
    route::get('/', 'EventController@index');
    route::post('/', 'EventController@store');
    route::get('/excel', 'LaporanController@eventexcel');
    route::get('/pdf', 'LaporanController@eventpdf');
    route::get('/{id}/edit', 'EventController@edit');
    route::get('create', 'EventController@create');
    route::post('{id}/update', 'EventController@update');
    route::post('{id}', 'EventController@destroy');
  });
  route::group(['prefix'=>'users'], function(){
    route::resource('/', 'BebasController');
  });
  route::group(['prefix'=>'peserta'], function(){
    route::get('/', 'PesertaController@index');
    route::get('/{id}/view', 'PesertaController@view');
    route::post('/{id}', 'PesertaController@destroy');
  });

});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
