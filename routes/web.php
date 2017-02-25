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
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'DashboardController@Dashboard');
Route::get('/dashboard/finances', 'DashboardController@Finances');
Route::post('/dashboard/finances', 'DashboardController@postFinances');

Route::get('/about', 'FrontController@about');
Route::get('/hackathons', 'FrontController@hackathons');

Auth::routes();
