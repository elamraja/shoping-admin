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
Route::get('/auth/','SiteController@showLogin');
Route::post('/auth/','SiteController@doLogin');
Route::get('/signout/','SiteController@doLogout');
Route::get('/', 'AdminController@showDashboard');

