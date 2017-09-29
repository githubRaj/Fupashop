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
use App\Tv;

Route::get('/data', function () {
  $somedata = DB::select('SELECT * FROM tvs');
  return $somedata;
  //return view('/data')->with('somedata', $somedata);
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');  // / -> home

Route::get('/tvs', function(){

	$tvs = Tv::all();

	return view ('tvs.index', compact('tvs'));
});