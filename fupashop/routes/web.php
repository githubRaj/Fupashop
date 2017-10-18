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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);  // / -> home
Route::get('/', 'ProductsController@getShowcaseArrays'); // -> for showcase

Route::get('/myAccount', ['as' => 'myAccount', 'uses' => 'HomeController@myAccount']);

Route::prefix('tvs')->group(function(){
	Route::get('/', 'ProductsController@Tvindex');
	Route::get('/{modelNumber}', 'ProductsController@getTv');
});

Route::prefix('monitors')->group(function(){
	Route::get('/', 'ProductsController@Monitorindex');
	Route::get('/{modelNumber}', 'ProductsController@getMonitor');
});

Route::prefix('desktops')->group(function(){
	Route::get('/', 'ProductsController@Desktopindex');
	Route::get('/{modelNumber}', 'ProductsController@getDesktop');
});

Route::prefix('tablets')->group(function(){


	Route::get('/', 'ProductsController@Tabletindex');
	Route::get('/{modelNumber}', 'ProductsController@getTablet');
});
//Route::get('/{itemType}', 'MapperController@tabletMapper');

Route::prefix('laptops')->group(function(){
	Route::get('/', 'ProductsController@Laptopindex');
	Route::get('/{modelNumber}', 'ProductsController@getLaptop');
});

Route::prefix('test')->group(function(){
	Route::get('/', 'ProductsController@test');
});

//Create shopping cart
Route::get('/add-to-cart/{id}', [
 	'uses' => 'ProductsController@getAddToCart',
	'as' => 'product@addToCart',
]);



//***************admin routes********************
//Admin Panel
Route::get('/adminpanel', function(){
  return view('admin/adminpanelmain/layouts');
});

//Edit Product
Route::get('admin/adminpanelviews/{id}/{productType}/edit', 'AdminController@edit');
Route::post('/adminpanel/{productType}', 'AdminController@update');

//Delete Product
Route::get('admin/adminpanelviews/{id}/{productType}/delete', 'AdminController@delete');

// Add desktop
Route::get('/adminpanel/addNewDesktop', 'AdminController@createDesktop');
Route::post('/storeDesktop', 'AdminController@storeDesktop');

//show desktops to admin
Route::get('/adminpanel/Desktops', 'AdminController@showAdminDesktops');

//add laptop
Route::get('/adminpanel/addNewLaptop', 'AdminController@createLaptop');
Route::post('/storeLaptop', 'AdminController@storeLaptop');

//show laptops to admin
Route::get('/adminpanel/Laptops', 'AdminController@showAdminLaptops');

// Add Tv
Route::get('/adminpanel/addNewTv', 'AdminController@createTv');
Route::post('/storeTv', 'AdminController@storeTv');

//show TVs to admin
Route::get('/adminpanel/Tvs', 'AdminController@showAdminTvs');

// Add Tablet
Route::get('/adminpanel/addNewTablet', 'AdminController@createTablet');
Route::post('/storeTablet', 'AdminController@storeTablet');

//show Tablets to admin
Route::get('/adminpanel/Tablets', 'AdminController@showAdminTablets');

// Add Monitor
Route::get('/adminpanel/addNewMonitor', 'AdminController@createMonitor');
Route::post('/storeMonitor', 'AdminController@storeMonitor');

//show Monitors to admin
Route::get('/adminpanel/Monitors', 'AdminController@showAdminMonitors');
