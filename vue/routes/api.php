<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('AllFood', 'App\Http\Controllers\API\FoodCategoryController@index');
Route::get('FoodCategory', 'App\Http\Controllers\API\FoodController@index');
Route::get('AddFood', 'App\Http\Controllers\API\FoodController@index');
Route::post('StoreFood', 'App\Http\Controllers\API\FoodController@store');
Route::get('EditFood/{id}', 'App\Http\Controllers\API\FoodController@edit');
Route::get('FoodDetail/{id}', 'App\Http\Controllers\API\FoodController@show');
Route::get('FoodSearch', 'App\Http\Controllers\API\FoodController@sreach');
Route::post('UpdateFood/{id}', 'App\Http\Controllers\API\FoodController@update');
Route::delete('DeleteFood/{id}', 'App\Http\Controllers\API\FoodController@delete');

