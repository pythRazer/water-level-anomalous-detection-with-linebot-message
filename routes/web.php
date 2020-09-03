<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/test', testController@test);

// LineBot push
Route::group(['prefix' => 'lineBot'], function(){
    Route::get('/pushMessage', 'LineBotController@pushMessage');
    Route::get('/pushImage', 'LineBotController@pushImage');
    Route::get('/pushLocation', 'LineBotController@pushLocation');


});

Route::get('/waterLevelTest', 'WaterLevelSinTestController@store');

// The editable table



Route::group(['prefix' => 'userinfo'], function(){
    Route::get('/','UserController@index');
    Route::post('/update','UserController@update');
    Route::group(['prefix' => '{user_id}'], function(){

        Route::get('/delete', 'UserController@userDelete');
    });



});
