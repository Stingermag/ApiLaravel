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
	return View::make('hello');
});
Route::get('transaction', function () 
{
    return View::make('transaction');
});
Route::get('read', function () 
{
    return View::make('read');
});

Route::get('first', function () 
{
    return View::make('user.users');
});

Route::resource('/reviews','ReviewController@show');
Route::resource('/create','ReviewController@create');