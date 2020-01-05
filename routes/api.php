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
Route::get('institution/{variables}','Api\ApiController@variables');
Route::get('sendSms','Api\ApiController@sendSms');
Route::any('reference','Api\ApiController@mpesaCallback');


Route::get('vars','Api\VariablesController@listVariables');
