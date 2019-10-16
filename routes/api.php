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

// Auth Routes
Route::post('login','Auth\LoginController@loginApi');
Route::post('register','Auth\RegisterController@registerApi');
Route::post('logout','Auth\LoginController@logoutApi');
Route::post('alluser','Api\ApiUserController@allUsers');
Route::post('userData','Api\ApiUserController@getUserData');
Route::post('edituser','Api\ApiUserController@editUserData');
Route::post('edituserimage','Api\ApiUserController@changeUserImage');
Route::post('adduser','Api\ApiUserController@addUser');
Route::post('getownregionagents','Api\ApiAgentController@getOwnRegionAgents');
Route::post('searchagent','Api\ApiAgentController@searchAgent');
Route::post('allagent','Api\ApiAgentController@allAgent');