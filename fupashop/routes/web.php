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

Auth::routes();


//Cart Implementation
Route::get('/cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::post('/cart', 'CartController@deleteFromCart');
Route::post('/cart/checkout', 'CartController@checkout')->name('checkout');
Route::post('/tablets', 'CartController@addToCart');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);  // / -> home
Route::get('/', 'ProductsController@getShowcaseArrays'); // -> for showcase
Route::get('/deleteAccount', 'UsersController@deleteAccount'); // delete the user account

Route::get('/myAccount', ['as' => 'myAccount', 'uses' => 'HomeController@myAccount']);

Route::get('/pastOrders', ['as' => 'pastOrders', 'uses' => 'UsersController@pastOrders']);

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

//Transaction page
Route::get('cart/checkout', function(){
    return view('checkout');
});

Route::post('pastOrders', 'UsersController@return');


/*----------------------------ADMIN ROUTING------------------------------*/

Route::prefix('admin')->group(function(){
	/*-------------------LOGIN:FORM VIEW------------------------------------------------*/
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	/*-------------------LOGIN:AUTHENTICATION ROUTING-----------------------------------*/
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	/*-------------------DASHBOARD/PANELVIEW-------------------------------------------*/
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	/*-------------------MODIFY ITEMS--------------------------------------------------*/
	//EDIT PRODUCT
	Route::get('/edit/{productType}/{id}', 'AdminController@editView');
	Route::post('/{productType}', 'AdminController@update');
	//DELETE PRODUCT
	Route::get('/delete/{productType}/{id}', 'AdminController@delete');
	Route::post('/delete/{productType}/{id}', 'AdminController@delete');
	/*-------------------VIEWS--------------------------------------------------------*/
	//VIEW DESKTOPS
	Route::get('/desktops', 'AdminController@desktopIndex');
	//VIEW LAPTOPS
	Route::get('/laptops', 'AdminController@laptopIndex');
	//VIEW TABLETS
	Route::get('/tablets', 'AdminController@tabletIndex');
	//VIEW MONITORS
	Route::get('/monitors', 'AdminController@monitorIndex');
	//VIEW USERS
	Route::get('/users', 'AdminController@userIndex');
	/*-------------------ADD NEW INSTANCE-------------------------------------------*/
	//ADDING FORM VIEW
	Route::get('/add/{item}', 'AdminController@creationFormView');
	//SUBMITTING FORM DATA
	Route::post('/save/{item}', 'AdminController@saveNewItem')->name('save');

	//View Serials
  Route::get('/viewSerial/{productType}/{modelNumber}', 'AdminController@viewSerial');

  //Serial Number Add Form
  Route::get('/addSerial/{productType}', 'AdminController@CreateSerialForm');

});
  //Sumbit Serial Number
Route::post('/saveSerial', 'AdminController@SaveSerial');
