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

Route::get('allOrders', 'OrderController@allOrders');
Route::get('allOrders/{id}', 'OrderController@userOrders');
Route::post('saveorder', 'OrderController@saveOrder');

Route::get('all','FoodController@allFoods');
Route::get('all/breakfast','FoodController@breakfastFood');
Route::get('all/lunch','FoodController@lunchFood');
Route::get('all/dinner','FoodController@dinnerFood');


Route::post('login', 'LoginController@login');
