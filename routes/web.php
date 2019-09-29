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

// All Test Routes (Api)
Route::get('test_token_expireIn', 'TestController@TokenExpireIn');
Route::get('test_routes', 'TestController@TestRoutes');
Route::post('test_login','Auth\LoginController@loginApi');
Route::post('test_register','Auth\RegisterController@registerApi');
Route::post('test_logout','Auth\LoginController@logoutApi');


// Project Admin Roues
	Route::redirect('/','/test_routes');
	Route::redirect('/home','/test_routes');

Route::group([
	// assign roles to user Route
	'middleware' => 'roles',
	'roles' => ['Super Admin', 'Admin'],
	'namespace' => 'Admin',
	], function () {

	Route::get('check-role',[
		'uses' => 'RoleController@CheckRole',
		'middleware' => 'roles',
		'roles' => ['Super Admin']
	]);
	Route::post('/assignrole',[
		'uses' => 'RoleController@assignRole',
		'as' => 'assign.roles',
		'middleware' => 'roles',
		'roles' => ['Super Admin']
	]);
	// Dashborad Routes
	Route::get('/admin', [
		'uses' => 'SystemController@showDashborad',
	]);

	
	Route::get('admin/users/banned', 'UserController@BannedUsers');
	Route::get('admin/users/{id}/ban', 'UserController@BanUser');
	Route::get('admin/users/{id}/unban', 'UserController@UnBanUser');
	Route::resource('admin/users', 'UserController');
	
});
	