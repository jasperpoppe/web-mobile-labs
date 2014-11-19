<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home controller
Route::get('/', 'HomeController@getIndex');
Route::get('/about', 'HomeController@getAbout');
Route::get('/discover', 'HomeController@getDiscover');
Route::get('/learn', 'HomeController@getLearn');
Route::get('/support', 'HomeController@getSupport');

// Login controller
Route::controller('login', 'LoginController');

// Users controller
Route::controller('users', 'UsersController');

// Admin controller
Route::get('/admin', 'AdminController@getIndex');
Route::get('/admin/good_practices', 'AdminController@getGood_practices');
Route::get('/admin/good_practices/new', 'AdminController@getNew_good_practices');
Route::get('/admin/good_practices/edit', 'AdminController@getEdit_good_practices');
Route::get('/admin/good_practices/delete', 'AdminController@getDelete_good_practices');