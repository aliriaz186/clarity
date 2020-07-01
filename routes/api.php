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
Route::get('technicians/get', 'TechnicianController@getTechnicians');
Route::post('update/info', 'ProfileController@updateInfo');
Route::post('update/next/info', 'ProfileController@updateNextInfo');
Route::post('expertise/save', 'ProfileController@expertiseSave');
Route::post('expertise/update', 'ProfileController@expertiseUpdate');
Route::post('accept/call/request', 'CallRequestController@acceptRequest');
Route::post('reject/call/request', 'CallRequestController@rejectRequest');
