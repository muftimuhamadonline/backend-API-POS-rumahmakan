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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/test', 'kasir\DashboardController@test');

// kasir
Route::prefix('kasir')->group(function () {
	Route::get('/', 'kasir\DashboardController@index');
	//products
	Route::get('/product', 'kasir\product\ProductController@index')->name('product');
	//cart
	Route::post('/additem/{id}', 'kasir\cart\CartController@store')->name('additem');
	Route::get('/getitem/', 'kasir\cart\CartController@index')->name('getitem');
	Route::get('/cancel/', 'kasir\cart\CartController@destroy')->name('cancel');
	//order
	Route::get('/order/', 'kasir\order\OrderController@index')->name('order');
	Route::get('/datacart/', 'kasir\order\OrderController@datacart')->name('datacart');
	Route::post('/formorder/', 'kasir\order\OrderController@payment')->name('formorder');
	Route::get('/orderdetails/', 'kasir\order\OrderController@getdataorder')->name('orderdetails');
	Route::get('/orderdetailbyid/{id}', 'kasir\order\OrderController@show')->name('orderdetailbyid');

});


// admin
Route::prefix('dashboard')->group(function () {
	Route::get('/', 'admin\DashboardController@index');
	//products
	Route::get('/product', 'admin\product\ProductController@index')->name('product');
	Route::post('/storeproduct', 'admin\product\ProductController@store')->name('storeproduct');
	//catergory
	Route::get('/category', 'admin\category\CategoryController@index')->name('category');
	Route::post('/storecategory', 'admin\category\CategoryController@store')->name('storecategory');
	Route::post('/editcategory/{id}', 'admin\category\CategoryController@edit')->name('editcategory');
	Route::get('/deletecategory/{id}', 'admin\category\CategoryController@destroy')->name('deletecategory');
});
