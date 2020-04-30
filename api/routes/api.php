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

Route::get('/', 'AppController@version');
Route::get('units', 'UnitController@index');
Route::get('units/{unit}', 'UnitController@show');
Route::post('units/{unit}', 'ChargeController@store');
Route::patch('units/{unit}/charges/{charge}', 'ChargeController@update');
