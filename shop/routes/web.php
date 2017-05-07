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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/items', 'ItemController@index');
    Route::get('/item/{id}', 'ItemController@show')->where('id', '[0-9]+');
    Route::get('/orders', 'OrderController@index');
    Route::get('/order/{id}', 'OrderController@show')->where('id', '[0-9]+');
    Route::get('/subscriptions', 'SubscriptionController@index');
    Route::get('/subscription/{id}', 'SubscriptionController@show')->where('id', '[0-9]+');
    Route::get('/subscription/new', 'SubscriptionController@create');
    Route::get('/subscription/activate/{id}', 'SubscriptionController@activate')->where('id', '[0-9]+');
    Route::get('/subscription/deactivate/{id}', 'SubscriptionController@deactivate')->where('id', '[0-9]+');
    Route::post('/subscription/new', 'SubscriptionController@store');
    Route::get('/cart', 'CartController@index');
    Route::post('/cart', 'CartController@store');
    Route::post('/cart/update', 'CartController@update');
    Route::get('/cart/delete/{id}', 'CartController@destroy')->where('id', '[0-9]+');
    Route::post('/cart/clear', 'CartController@clear');
    Route::get('/cart/checkout', 'CartController@checkout');
    Route::post('/cart/complete', 'CartController@completeOrder');
    Route::get('/deliveries', 'DeliveryController@index');
});
Route::group(['prefix' => 'admin', 'middleware' => 'manager'], function () {
    Route::get('/', 'HomeController@index');
});
Route::group(['middleware' => 'manager'], function () {
    Route::get('/item/new', 'ItemController@create');
    Route::post('/item/new', 'ItemController@store');
    Route::get('/item/edit/{id}', 'ItemController@edit')->where('id', '[0-9]+');
    Route::post('/item/update/{id}', 'ItemController@update')->where('id', '[0-9]+');
    Route::post('/item/delete/{id}', 'ItemController@destroy')->where('id', '[0-9]+');
    Route::post('/order/update', 'OrderController@update');
    Route::post('/order/subscription/create', 'OrderController@createSubscriptionOrders');
    Route::get('/users', 'UserController@index');
    Route::post('/deliveries/export', 'DeliveryController@export');
    Route::get('/deliveries/update', 'DeliveryController@update');
});

