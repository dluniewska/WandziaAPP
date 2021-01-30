<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

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

Route::get('animal', 'App\Http\Controllers\apiController@animal');
Route::get('animal/{id}', 'App\Http\Controllers\apiController@animalID');
Route::post('animal', 'App\Http\Controllers\apiController@animalSave');
Route::put('animal/{id}', 'App\Http\Controllers\apiController@animalUpdate');
Route::delete('animal/{id}', 'App\Http\Controllers\apiController@animalDelete');