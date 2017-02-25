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

Route::get('/', function () {return view('index');});
Route::get('/about', 'FrontController@About');
Route::get('/hackathons', 'FrontController@Hackathons');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', 'DashboardController@Dashboard');
  Route::get('/dashboard/finances', 'DashboardController@Finances');
  Route::post('/dashboard/finances', 'DashboardController@PostFinances');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@GetLogin');
Route::post('login', 'Auth\AuthController@Login');
Route::get('logout', 'Auth\AuthController@GetLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@GetRegister');
Route::post('register', 'Auth\AuthController@Register');
