<?php
use App\Mail\MarkdownTest;
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

Route::get('/mailz', function () {
  $f = 'wordss';
  $l = "tryyyy";
    Mail::to('ahmedibrahim3000@gmail.com')->send(new MarkdownTest($f, $l));
    return redirect()->action('PageController@getIndex');
});

Route::get('/sorted/{platform}', 'PageController@getSortedGames')->name('sorted');

Route::get('/login', 'PageController@login');
Route::get('/register', 'PageController@register');
Route::get('/contact', 'PageController@getContact');
Route::post('/contact_us', 'PageController@contact_us');
Route::get('/about', 'PageController@getAbout');
Route::get('/', 'PageController@getIndex');

Route::get('/game_upload', 'ProductController@uploadGame');

Route::get('/account', 'PageController@getAccount');
Route::get('/orders', 'ProductTransactionController@getOrders');
Route::get('/my_uploads', 'ProductTransactionController@getUploads');
Route::post('/subscribe', 'EmailsubscriptionController@store');
Route::put('/unsubscribe', 'EmailsubscriptionController@update');

Route::resource('cart', 'CartController');
Route::resource('products', 'ProductController');
Route::resource('misc', 'MiscController');
Route::resource('uploads', 'SellTransactionController');

Route::put('/account/updateDetails/{id}', ['as' => 'misc.updateDetails', 'uses' => 'MiscController@updateDetails']);
Route::put('/account/updateInfo/{id}', ['as' => 'misc.updateInfo', 'uses' => 'MiscController@updateInfo']);

Route::get('/orderFail/{failRef}', 'ProductTransactionController@orderFail');
Route::get('/orderSuccess/{tref}', 'ProductTransactionController@orderSuccess');

Route::get('/cart/{id}/addBuyCart', ['as' => 'cart.addBuy', 'uses' => 'CartController@addBuyCart']);
Route::get('/cart/{id}/addSellCart', ['as' => 'cart.addSell', 'uses' => 'CartController@addSellCart']);

Route::post('/cart/{id}/removeBuy', ['as' => 'cart.removeBuy', 'uses' => 'CartController@removeBuy']);
Route::post('/cart/{id}/removeSell', ['as' => 'cart.removeSell', 'uses' => 'CartController@removeSell']);

Route::put('/cart/{id}/updateBuy', ['as' => 'cart.updateBuy', 'uses' => 'CartController@updateBuy']);
Route::put('/cart/{id}/updateSell', ['as' => 'cart.updateSell', 'uses' => 'CartController@updateSell']);

Route::get('/viewBuy', 'CartController@viewBuyCart');
Route::get('viewSell', 'CartController@viewSellCart');
Route::get('/checkout', 'CartController@checkout');

Route::get('/products/{img_name}', ['as' => 'products.show', 'uses' => 'ProductController@show']);
Route::post('/products/{img_name}', ['uses' => 'BlogController@store', 'as' => 'blogs.store']);

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

Route::group(['prefix' => 'admin_lgx'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/dashboard', 'LGXAdminController@getDashboard');
  Route::get('/addProduct', 'LGXAdminController@addProduct');
  Route::get('/disapproved_games', 'LGXAdminController@viewDisapproved');
  Route::get('/failed_transactions', 'LGXAdminController@failed_transactions');
  Route::get('/temp_uploads', 'LGXAdminController@tempUploads');
  Route::get('/games_awaiting_purchase', 'LGXAdminController@viewPendingPurchase');
  Route::get('/games_sold', 'LGXAdminController@gamesSold');
  Route::get('/games_delivered', 'LGXAdminController@gamesDelivered');
  Route::get('/delivery_update/{id}', 'LGXAdminController@update_delivered');
  Route::get('/approve/{id}', 'LGXAdminController@approve');
  Route::get('/disapprove/{id}', 'LGXAdminController@disApprove');
  Route::get('/search', 'LGXAdminController@admin_search');
  Route::get('/update_id/{id}', 'LGXAdminController@id_update');
  Route::get('/search_refno', 'LGXAdminController@search_refno');
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

  Route::post('customer/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('customer/password/reset', 'CustomerAuth\ResetPasswordController@reset');
  Route::get('customer/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('customer/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
// });
