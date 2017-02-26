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
Route::get('/about', 'FrontController@about');
Route::get('/hackathons', 'FrontController@hackathons');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', 'DashboardController@Dashboard');
  Route::get('/dashboard/finances', 'DashboardController@Finances');
  Route::post('/dashboard/finances', 'DashboardController@PostFinances');
  Route::get('/dashboard/food', 'DashboardController@Food');
  Route::post('/dashboard/food', 'DashboardController@PostFood');
  Route::post('/dashboard/prize', 'DashboardController@PostPrize');
  Route::get('/dashboard/prize', 'DashboardController@Prize');
  Route::post('/dashboard/sponsor', 'DashboardController@PostSponsor');
  Route::get('/dashboard/sponsor', 'DashboardController@Sponsor');
  Route::post('/dashboard/talk', 'DashboardController@PostTalk');
  Route::get('/dashboard/talk', 'DashboardController@Talk');
  Route::post('/dashboard/theme', 'DashboardController@PostTheme');
  Route::get('/dashboard/theme', 'DashboardController@Theme');
  Route::get('/dashboard/create', 'DashboardController@CreateHackathon');
  Route::post('dashboard/submit', 'DashboardController@SubmitHackathon');
  Route::get('/dashboard/admin', 'DashboardController@Administration');
  Route::get('/dashboard/profile', 'DashboardController@Profile');
  Route::post('/dashboard/profile', 'DashboardController@UpdateProfile');
  Route::get('/dashboard/events/{id?}', 'DashboardController@ShowHackathon');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@GetLogin');
Route::post('login', 'Auth\AuthController@Login');
Route::get('/logout', function() {
    Auth::logout();
    Session::forget('user');
    return Redirect::to('/');
});

// Registration routes...
Route::get('register', 'Auth\AuthController@GetRegister');
Route::post('register', 'Auth\AuthController@Register');
