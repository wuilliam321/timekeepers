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

Route::get('/planillas/filters', 'PlanillasController@getPlanillasFilters')
    ->middleware('auth:api');

Route::get('/horas_entrada/{id}', 'HorasEntradasController@getHorasEntradasByColaboradorId')
    ->middleware('auth:api');

Route::post('/horas_entrada/{id}', 'HorasEntradasController@saveByColaboradorId')
    ->middleware('auth:api');

Route::get('/horas_laboradas/{planilla_id}', 'HorasLaboradasController@getHorasLaboradasByPlanillaId')
    ->middleware('auth:api');

Route::post('/horas_laboradas/{id}', 'HorasLaboradasController@saveByColaboradorId')
    ->middleware('auth:api');

Route::delete('/horas_laboradas/{id}', 'HorasLaboradasController@deleteById')
    ->middleware('auth:api');

Route::get('/cuentas_costo', 'CuentasCostoController@getAllCuentas')
    ->middleware('auth:api');

Route::get('/beneficios', 'BeneficiosController@getAllBeneficios')
    ->middleware('auth:api');

Route::get('/cuentas_beneficios', 'CuentasBeneficiosController@getAllCuentas')
    ->middleware('auth:api');

Route::get('/logger', 'HorasLogsController@log')
    ->middleware('auth:api');
