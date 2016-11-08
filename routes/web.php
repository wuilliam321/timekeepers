<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'HomeController@index')->name("main");
Auth::routes();
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::get('/planillas', 'PlanillasController@index')->name("planillas");
Route::get('/logger', 'HorasLogsController@view')->name('logger');
