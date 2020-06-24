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
Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('route:cache');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    // return what you want
});
Route::get('/login', 'AuthController@loginForm');
Route::post('/admin/login', 'AuthController@login');
Route::post('/signout', 'AuthController@signout');
Route::get('dashboard', 'DashboardController@index')->middleware('checkAuth');

//Talha's routes
Route::get('/profile', 'ProfileController@viewProfilePage');
Route::get('/basic-information', 'ProfileController@viewBasicInfoPage');
Route::post('basic-info/save', 'ProfileController@saveBasicInfo');
Route::get('/profile-photo', 'ProfileController@viewProfilePhotoPage');
Route::post('/profile/update', 'ProfileController@updateProfilePhoto');
Route::get('/outlet', 'ProfileController@viewOutletPage');
Route::post('outlet/save', 'ProfileController@saveOutletInfo');
Route::post('outlet/delete', 'ProfileController@deleteOutlet');

//Hasssan's routes
Route::get('signup', 'AuthController@showSignUpForm');
//Route::get('login', 'AuthController@showLoginForm');
