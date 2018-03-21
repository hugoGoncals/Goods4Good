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
Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/badgets', function () {
    return view('badgets');
});

Route::get('/userprofile', function () {
    return view('userProfile');
});

/*Init routes*/

Route::get('/', function () {
    return view('index');
});
/*END Init routes*/

/* admin routes START */

Route::get('/categorie', function () {
    return view('categorie');
});

Route::get('/adminproviderproducts', function(){
    return view('adminproviderproducts');
});

Route::get('/productsList', function() {
    return view('productsList');
});

Route::get('/productnotdelived', function(){
	return view('productnotdelived');
});

Route::get('/productdelived', function(){
	return view('productdelived');
});

Route::get('/baskets', function () {
  	return view('admin');
});

Route::get('/admin', function () {
  	return view('adminhome');
});

Route::get('/products', function () {
    return view('providerProduct');
});

Route::get('/productsMy', function () {
    return view('providerMyProds');
});
Route::get('/provider', function () {
    return view('initPageProvider');
});

Route::get('/provideradmin', function () {
    return view('provider');
});


/* admin routes END */

/* ROUTES GERAIS */

//donations routes
Route::get('api/donation/{id?}','DonationController@index');
Route::post('api/donation','DonationController@store');
Route::post('api/donation/{id?}','DonationController@update');
Route::delete('api/donation/{id?}','DonationController@destroy');
Route::get('api/donation/listBasket/{id?}','DonationController@listBasket');
Route::get('api/donation/listDonationsMade/{id?}','DonationController@listDonationsMade');
Route::get('api/donation/listDonationsDetails/{id?}','DonationController@listDonationsDetails');
Route::get('api/donation/listLines/{id?}','DonationController@listLines');
Route::post('api/donation/saveCar','DonationController@saveCar');

//products basket route
Route::get('api/productsbasket/{id?}','ProductsbasketController@index');
Route::post('api/productsbasket','ProductsbasketController@store');
Route::get('api/productsbasket/listbasket/{id?}','ProductsbasketController@listBasket');
Route::post('api/productsbasket/{id?}','ProductsbasketController@update');
Route::delete('api/productsbasket/{id?}','ProductsbasketController@destroy');

//product line route
Route::get('api/productsline/{id?}','ProductslineController@index');
Route::post('api/productsline','ProductslineController@store');
Route::post('api/productsline/{id?}','ProductslineController@update');
Route::delete('api/productsline/{id?}','ProductslineController@destroy');

//providers route
Route::get('api/provider/{id?}','ProviderController@index');
Route::post('api/provider','ProviderController@store');
Route::post('api/provider/{id?}','ProviderController@update');
Route::delete('api/provider/{id?}','ProviderController@destroy');


//product route
Route::get('api/product/{id?}','ProductController@index');
Route::post('api/product','ProductController@store');
Route::post('api/product/{id?}','ProductController@update');
Route::delete('api/product/{id?}','ProductController@destroy');
Route::get('api/product/listProductByCategory/{id?}','ProductController@listProductByCategory');
Route::get('api/product/listProductByProvider/{id?}','ProductController@listProductByProvider');
Route::get('api/product/productList/{id?}','ProductController@productList');
Route::get('api/product/listarProducts/{id?}','ProductController@listarProducts');

//categories route
Route::get('api/categorie/{id?}','CategorieController@index');
Route::post('api/categorie','CategorieController@store');
Route::post('api/categorie/{id?}','CategorieController@update');
Route::delete('api/categorie/{id?}','CategorieController@destroy');


/* ROUTES GERAIS END */

Auth::routes();

Route::get('/home', 'HomeController@index');

