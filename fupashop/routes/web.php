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

Route::get('/data', function () {
  $somedata = DB::select('SELECT * FROM tvs');
  return $somedata;
  //return view('/data')->with('somedata', $somedata);
});

Auth::routes();

Route::get('/admin', 'AdminController@index');
Route::get('/', 'HomeController@index');  // / -> home
