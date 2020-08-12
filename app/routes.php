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

Route::get('/', function()
{
	return View::make('user.users');
});
Route::get('transaction', function () 
{
    return View::make('transaction');
});
Route::get('read', function () 
{
    return View::make('read');
});

Route::get('users', function () 
{
    return View::make('user.users');
});

Route::resource('/shows','ReviewController@show');
Route::resource('/showall','ReviewController@showall');
Route::resource('/create','ReviewController@create');