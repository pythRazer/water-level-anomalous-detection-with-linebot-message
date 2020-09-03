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

Route::post('waterlevel/store', 'Api\WaterLevelController@store');
Route::get('waterlevel/index', 'Api\WaterLevelController@index');
Route::delete('waterlevel/{id}/delete', 'Api\WaterLevelController@destroy');
Route::put('waterlevel/{id}/update', 'Api\WaterLevelController@update');

Route::post('entity/store', 'Api\EntityController@store');
Route::get('entity/index', 'Api\EntityController@index');
Route::delete('entity/{id}/delete', 'Api\EntityController@destroy');
Route::put('entity/{id}/update', 'Api\EntityController@index');




Route::namespace('Api')->group(function(){
    Route::apiResource('waterLevel', 'WaterLevelController');
    Route::apiResource('entity', 'EntityController');

});
