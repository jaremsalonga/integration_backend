<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', 'ShopifyController@getProduct');
Route::get('/product/{id}', 'ShopifyController@getProduct');
Route::post('/product', 'ShopifyController@postProduct');

Route::get('/order', 'ShopifyController@getOrder');
Route::get('/order/{id}', 'ShopifyController@getOrder');
Route::post('/order', 'ShopifyController@newOrder');