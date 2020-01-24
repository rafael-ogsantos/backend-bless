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

//move the son and his
Route::post('add-messages', 'TestController@addMessage');
Route::post('getMessageSector', 'TestController@getMessageSector');
Route::post('getMessageSectorPending', 'TestController@getMessageSectorPending');
Route::post('getPropertyType', 'TestController@getPropertyType');
Route::post('get-mails', 'TestController@getMails');

// Auth Routes
Route::post('login','Auth\LoginController@loginApi');
Route::post('register','Auth\RegisterController@registerApi');
Route::post('logout','Auth\LoginController@logoutApi');
Route::post('alluser','Api\ApiUserController@allUsers');
Route::post('allusers','Api\ApiUserController@storeUsers');
Route::post('userData','Api\ApiUserController@getUserData');
Route::post('edituser','Api\ApiUserController@editUserData');
Route::post('edituserimage','Api\ApiUserController@changeUserImage');
Route::post('adduser','Api\ApiUserController@addUser');
Route::post('getownregionagents','Api\ApiAgentController@getOwnRegionAgents');
Route::post('searchagent','Api\ApiAgentController@searchAgent');
Route::post('allagent','Api\ApiAgentController@allAgent');

// Property Routes
Route::post('properties','Api\ApiPropertyController@index');
Route::get('imoveis','Api\ApiPropertyController@propertiesAll');
Route::post('properties-map-data','Api\ApiPropertyController@propertiesMapData');
Route::post('add-property','Api\ApiPropertyController@addProperty');
Route::post('add-property-image','Api\ApiPropertyController@addPropertyImage');
Route::post('edit-property','Api\ApiPropertyController@editProperty');
Route::post('edit-property-image','Api\ApiPropertyController@editPropertyImage');
Route::post('delete-property','Api\ApiPropertyController@deleteProperty');