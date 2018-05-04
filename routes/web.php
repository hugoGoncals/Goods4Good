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
Route::get('/inboxp', function () {
    return view('inboxProvider');
});

Route::get('/inboxa', function () {
    return view('inboxAdmin');
});

Route::get('/inbox', function () {
    return view('inbox');
});

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

Route::get('/urgentNeeds', function () {
    return view('urgentNeeds');
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

//donations line route
Route::get('api/linedonation/{id?}','LinedonationController@index');
Route::post('api/linedonation','LinedonationController@store');
Route::post('api/linedonation/{id?}','LinedonationController@update');
Route::delete('api/linedonation/{id?}','LinedonationController@destroy');

//donations routes
Route::get('api/donation/{id?}','DonationController@index');
Route::post('api/donation','DonationController@store');
Route::post('api/donation/{id?}','DonationController@update');
Route::delete('api/donation/{id?}','DonationController@destroy');
Route::get('api/donation/listBasket/{id?}','DonationController@listBasket');
Route::get('api/donation/listDonationsMadeByUser/listagem/{id?}','DonationController@listDonationsMadeByUser');
Route::get('api/donation/listDonationsMade/{id?}','DonationController@listDonationsMade');
Route::get('api/donation/listDonations/{id?}','DonationController@listDonations');
Route::get('api/donation/listDonationsDetails/{id?}','DonationController@listDonationsDetails');
Route::get('api/donation/listLines/{id?}','DonationController@listLines');
Route::get('api/donation/sumDonations/{id?}','DonationController@sumDonations');
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
Route::get('api/provider/listagem','ProviderController@index');
Route::get('api/provider/listProvider','ProviderController@listPossibleProviders');
Route::post('api/provider','ProviderController@store');
Route::get('api/provider/showProvider/{id?}','ProviderController@showProvider');
Route::post('api/provider/{id?}','ProviderController@update');
Route::delete('api/provider/{id?}','ProviderController@destroy');

//product route
/*Route::get('api/product/{id?}','ProductController@index');
Route::get('api/product/prod/automatic','ProductController@listSomeProducts');
Route::post('api/product','ProductController@store');
Route::post('api/product/{id?}','ProductController@update');
Route::delete('api/product/{id?}','ProductController@destroy');
Route::get('api/product/listProductByCategory/{id?}','ProductController@listProductByCategory');
Route::get('api/product/listProductByProvider/{id?}','ProductController@listProductByProvider');
Route::get('api/product/productList/{id?}','ProductController@productList');
Route::get('api/product/listProductstatus/{id?}','ProductController@listProductstatus');
Route::get('api/product/newList/{id?}','ProductController@newList');
Route::get('api/product/listarProducts/{id?}','ProductController@listarProducts');*/
Route::get('api/product/{id?}','ProductController@index');
Route::get('api/product/prod/automatic','ProductController@listSomeProducts');
Route::post('api/product','ProductController@store');
Route::post('api/product/{id?}','ProductController@update');
Route::delete('api/product/{id?}','ProductController@destroy');
Route::get('api/product/listProductByCategory/{id?}','ProductController@listProductByCategory');
Route::get('api/product/listProductByProvider/{id?}','ProductController@listProductByProvider');
Route::get('api/product/productList/{id?}','ProductController@productList');
Route::get('api/product/listProductstatus/{id?}','ProductController@listProductstatus');
Route::get('api/product/newList/{id?}','ProductController@newList');
Route::get('api/product/listarProducts/{id?}','ProductController@listarProducts');
Route::post('api/product/status/change','ProductController@updateProductStatus');

//necessity route 
Route::get('api/urgentNeeds','ProductController@listUrgentNeeds');

//categories route
Route::get('api/categorie/{id?}','CategorieController@index');
Route::post('api/categorie','CategorieController@store');
Route::post('api/categorie/{id?}','CategorieController@update');
Route::delete('api/categorie/{id?}','CategorieController@destroy');

//Messages route
Route::get('api/notification/{id?}','NotificationController@index');
Route::post('api/notification','NotificationController@store');
Route::post('api/notification/{id?}','NotificationController@update');
Route::delete('api/notification/{id?}','NotificationController@destroy');
Route::get('api/notification/showMenssagesReceived/{id?}','NotificationController@showMenssagesReceived');
Route::get('api/notification/showMenssagesSent/{id?}','NotificationController@showMenssagesSent');
Route::get('api/notification/showMenssagesReceivedReaded/{id?}','NotificationController@showMenssagesReceivedReaded');
Route::get('api/notification/menssageList/{id?}','NotificationController@menssageList');
Route::get('api/notification/countMessagesUnreaded/{id?}','NotificationController@countMessagesUnreaded');

//Paypal routes
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));

//badget route
Route::get('api/badget/{id?}','BadgetController@index');
Route::post('api/badget','BadgetController@store');
Route::post('api/badget/{id?}','BadgetController@update');
Route::delete('api/badget/{id?}','BadgetController@destroy');

/* ROUTES GERAIS END */

Auth::routes();

Route::get('/inicio', 'HomeController@index');
Route::get('/home', 'HomeController@redireciona');
Route::get('/api/listUsers', 'HomeController@listUsers');


/* ROUTE EMAIL */

Route::post('/', 'MailController@basic_email');
Route::post('api/email/registerEmail', 'MailController@register');
Route::get('/', 'MailController@index');
//Route::resource('redirecionaMail', 'MailController@redirecionaMail');

Route::get('/config_clear',function(){
    Artisan::call('config:cache');
});

/*ROUTE FACEBOOK */
Route::get('auth/facebook', ['as'=>'auth/facebook','uses'=>'Auth\LoginController@redirectToProvider']);
Route::get('auth/facebook/callback', ['as'=>'auth/facebook/callback','uses'=>'Auth\LoginController@handleProviderCallback']);

/*ROUTE GOOGLE*/
Route::get('auth/google', ['as'=>'auth/google','uses'=>'Auth\LoginController@redirectToGoogle']);
Route::get('auth/google/callback', ['as'=>'auth/google/callback','uses'=>'Auth\LoginController@handleGoogleCallback']);

/*ROUTE TWITTER*/
Route::get('auth/twitter', ['as'=>'auth/twitter','uses'=>'Auth\LoginController@redirectToTwitter']);
Route::get('auth/twitter/callback', ['as'=>'auth/twitter/callback','uses'=>'Auth\LoginController@handleTwitterCallback']);

/*Route editar user*/
Route::post('api/user/editar','userController@editUser');

/*ROUTA LISTAR PRODUTOS DOS BASCKETS*/
Route::get('api/productsbasket/prods/{id?}','ProductsbasketController@listProdBasket');








Route::get('api/provider/getProv/{id?}','ProviderController@listProvById');
