<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/planillas', 'PlanillasController@getPlanillas')
    ->middleware('auth:api');

Route::get('/horas_entrada/{id}', 'HorasEntradasController@getHorasEntradasByColaboradorId')
    ->middleware('auth:api');

Route::post('/horas_entrada/{id}', 'HorasEntradasController@saveByColaboradorId')
    ->middleware('auth:api');

Route::get('/horas_laboradas/{id}', 'HorasLaboradasController@getHorasLaboradasByColaboradorId')
    ->middleware('auth:api');
