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
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/', 'HomeController@index');  // / -> home

Route::get('/myAccount', ['as' => 'myAccount' , 'uses'=> 'HomeController@myAccount']);

Route::prefix('tvs')->group(function(){
	Route::get('/', 'ProductsController@Tvindex');
	Route::get('/{id}', 'ProductsController@getTv');
});

Route::prefix('monitors')->group(function(){
	Route::get('/', 'ProductsController@Monitorindex');
	Route::get('/{id}', 'ProductsController@getMonitor');
});

Route::prefix('desktops')->group(function(){
	Route::get('/', 'ProductsController@Desktopindex');
	Route::get('/{id}', 'ProductsController@getDesktop');
});

Route::prefix('tablets')->group(function(){


	Route::get('/', 'ProductsController@Tabletindex');
	Route::get('/{id}', 'ProductsController@getTablet');
});
//Route::get('/{itemType}', 'MapperController@tabletMapper');

Route::prefix('laptops')->group(function(){
	Route::get('/', 'ProductsController@Laptopindex');
	Route::get('/{id}', 'ProductsController@getLaptop');
});

Route::prefix('test')->group(function(){
	Route::get('/', 'ProductsController@test');
});

Route::get('/Product/create', 'ProductsController@Create');
Route::post('/store', 'ProductsController@store');

Route::get('/adminpanel', function(){
  return view('admin/sidebar/layouts');
});


//Create shopping cart
Route::get('/add-to-cart/{id}', [
 	'uses' => 'ProductsController@getAddToCart',
	'as' => 'product@addToCart',
]);
