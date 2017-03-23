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
Route::get('/login', 'PageController@login');
Route::get('/register', 'PageController@register');
Route::get('/contact', 'PageController@getContact');
Route::get('/about', 'PageController@getAbout');
Route::get('/', 'PageController@getIndex');

Route::get('/account', 'PageController@getAccount');
Route::get('/orders', 'TransactionController@getOrders');

Route::resource('cart', 'CartController');
Route::resource('products', 'ProductController');
Route::resource('misc', 'MiscController');
// Route::resource('transaction', 'TransactionController');

Route::put('/account/updateDetails/{id}', ['as' => 'misc.updateDetails', 'uses' => 'MiscController@updateDetails']);
Route::put('/account/updateInfo/{id}', ['as' => 'misc.updateInfo', 'uses' => 'MiscController@updateInfo']);

Route::get('/transaction/{ref}', 'TransactionController@checkout');
// Route::get('/transaction/{id}', ['as' => 'transaction.done', 'uses' => 'TransactionController@myTest']);

Route::get('/cart/{id}/addBuyCart', ['as' => 'cart.addBuy', 'uses' => 'CartController@addBuyCart']);
Route::get('/cart/{id}/addSellCart', ['as' => 'cart.addSell', 'uses' => 'CartController@addSellCart']);

Route::post('/cart/{id}/removeBuy', ['as' => 'cart.removeBuy', 'uses' => 'CartController@removeBuy']);
Route::post('/cart/{id}/removeSell', ['as' => 'cart.removeSell', 'uses' => 'CartController@removeSell']);

Route::put('/cart/{id}/updateBuy', ['as' => 'cart.updateBuy', 'uses' => 'CartController@updateBuy']);
Route::put('/cart/{id}/updateSell', ['as' => 'cart.updateSell', 'uses' => 'CartController@updateSell']);

Route::get('viewBuy', 'CartController@viewBuyCart');
Route::get('viewSell', 'CartController@viewSellCart');

Route::get('/products/{id}', ['as' => 'products.show', 'uses' => 'ProductController@show']);
Route::post('/products/{id}', ['uses' => 'BlogController@store', 'as' => 'blogs.store' ]);

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

// Route::group(['prefix' => 'customer'], function () {
// Route::group( [], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
// });
