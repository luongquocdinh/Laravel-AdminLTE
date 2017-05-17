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

Route::get('/', function () {
    return redirect('login');
});

//Router User
Route::group(['prefix' => 'user', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
    Route::post('/', 'UserController@store');
    Route::get('/{id}/edit', 'UserController@edit');
    Route::post('/{id}', 'UserController@update');
    Route::get('/{id}/change_block', 'UserController@change_block');
});
//Router Role
Route::group(['prefix' => 'role', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'RoleController@index');
    Route::get('/create', 'RoleController@create');
    Route::post('/', 'RoleController@store');
    Route::get('/{id}/edit', 'RoleController@edit');
    Route::post('/{id}', 'RoleController@update');
});
//Router Permission
Route::group(['prefix' => 'permission', 'middleware' => ['role:admin']], function() {
    Route::get('/','PermissionController@index');
    Route::get('/create','PermissionController@create');
    Route::post('/','PermissionController@store');
    Route::get('/{id}/edit','PermissionController@edit');
    Route::post('/{id}','PermissionController@update');
});

Auth::routes();

Route::get('/home', 'UserController@index');