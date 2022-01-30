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

Route::group(['middleware'=>'admin'],function(){





});

Route::resource('/product','ProductController');

Route::resource('/','FrontEndController');

Route::post('/cart/add',[
    'uses'=>'ShoppingController@add_to_cart',
    'as'=>'cart.add'
]);

Route::get('/cart',[
   'uses'=>'ShoppingController@cart',
   'as'=>'cart'
]);

Route::get('/cart/delete/{id}',[
   'uses'=>'ShoppingController@cart_delete',
   'as'=>'cart.delete'
]);

Route::get('/cart/incr/{id}/{qty}',[
   'uses'=>'ShoppingController@cart_incr',
   'as'=>'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}',[
    'uses'=>'ShoppingController@cart_decr',
    'as'=>'cart.decr'
]);

Route::get('/cart/rapid/add/{id}',[
   'uses'=>'ShoppingController@cart_rapid',
   'as'=>'cart.rapid.add'
]);

Route::get('checkout',[
   'uses'=>'CheckoutController@index',
   'as'=>'checkout'
]);

Route::post('checkout',[
   'uses'=>'CheckoutController@stripe',
   'as'=>'checkout'
]);


