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
Route::get('t2', 'PageController@getT2');
Route::get('t1', 'PageController@getT1');
Route::get('contact', 'PageController@getContact');
Route::get('about', 'PageController@getAbout');
Route::get('/', 'PageController@getIndex');

Route::get('product-info', 'ProductController@index');

