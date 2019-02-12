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

Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/category/{id}/{name}/{sub}', 'BerandaController@categories')->name('cat');
Route::get('/get-state/{countryId}','BerandaController@state')->name('state');
Route::get('/product/{id}/{category}/{sub}/{name}','ProductController@view')->name('product.view');
Route::get('/checkout/{id}/{category}/{sub}/{name}','PaymentController@step1')->name('step1');
Route::post('/checkout/{id}/{category}/{sub}/{name}','PaymentController@store')->name('store.step1');
Route::get('/checkout/{id}', 'PaypalController@showForm');

// Post payment details for store/process API request
Route::post('/checkout/{id}', 'PaypalController@store')->name('go');
Route::get('/success', 'BerandaController@success');
Route::get('/test', 'CheckoutController@index');

// Handle status
Route::get('/payment/add-funds/paypal/status', 'PaypalController@getPaymentStatus');

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function () {
Route::get('/bloadmin', 'AdminController@index')->name('admin');
// SLIDER ROUTER
Route::get('/bloadmin/add/slider', 'AdminController@createslider')->name('add.slider');
Route::post('/bloadmin/add/slider', 'AdminController@storeslider')->name('store.slider');
Route::get('/bloadmin/sliders', 'AdminController@slider')->name('data.slider');
Route::get('/bloadmin/update/slider/{id}', 'AdminController@editslider')->name('edit.slider');
Route::patch('/bloadmin/update/slider/{id}', 'AdminController@updateslider')->name('update.slider');
Route::delete('/bloadmin/delete/slider/{slider}', 'AdminController@sliderdestroy')->name('slider.destroy');
// END SLIDER
// SLIDER CATEGORY
Route::get('/bloadmin/add/category', 'AdminController@createcategory')->name('add.category');
Route::post('/bloadmin/add/category', 'AdminController@storecategory')->name('store.category');
Route::get('/bloadmin/categories', 'AdminController@category')->name('data.category');
Route::get('/bloadmin/update/category/{id}', 'AdminController@editcategory')->name('edit.category');
Route::patch('/bloadmin/update/category/{id}', 'AdminController@updatecategory')->name('update.category');
Route::delete('/bloadmin/delete/category/{category}', 'AdminController@categorydestroy')->name('category.destroy');
// END CATEGORY
// PRODUCT ROUTER
Route::get('/bloadmin/add/product', 'AdminController@createproduct')->name('add.product');
Route::post('/bloadmin/add/product', 'AdminController@storeproduct')->name('store.product');
Route::get('/bloadmin/products', 'AdminController@product')->name('data.product');
Route::get('/bloadmin/update/product/{id}', 'AdminController@editproduct')->name('edit.product');
Route::patch('/bloadmin/update/product/{id}', 'AdminController@updateproduct')->name('update.product');
Route::delete('/bloadmin/delete/product/{product}', 'AdminController@productdestroy')->name('product.destroy');
// END PRODUCT
});
Route::get('/customers', 'HomeController@customer')->name('home');