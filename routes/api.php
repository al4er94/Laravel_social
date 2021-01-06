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

Route::get('/adminLogin', 'Admin\AdminAuth@getAuth');
Route::post('/adminLogin/auth', 'Admin\AdminAuth@postAuth');

Route::get('/getNews', 'Admin\AdminController@getNews');
Route::post('/postNews', 'Admin\AdminController@addNews');

Route::get('/getNewsContentById', 'Admin\AdminController@getNewsContentById');