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

Route::get('/planillas', function () {
    return DB::table('planillas')
        ->join('colaboradores', 'colaboradores.id', '=', 'planillas.colaborador_id')
        ->join('proyectos', 'proyectos.id', '=', 'planillas.proyecto_id')
        ->select(
            'planillas.*',
            'colaboradores.nombre as nombre_colaborador',
            'colaboradores.cedula',
            'colaboradores.tipo_salario',
            'proyectos.nombre as nombre_proyecto')
        ->get();

})->middleware('auth:api');

Route::get('/horas_entrada/{id}', function ($id) {
    return DB::table('horas_entrada')->where('colaborador_id', '=', $id)->get();
})->middleware('auth:api');

Route::get('/horas_entrada/{id}/limit/{limit}', function ($id, $limit) {
    return DB::table('horas_entrada')
        ->where('colaborador_id', '=', $id)
        ->orderBy('fecha_entrada', 'asc')
        ->limit($limit)
        ->get();
})->middleware('auth:api');


Route::get('/horas_laboradas/{id}', 'HorasLaboradasController@getHorasLaboradasWithLastDates')
    ->middleware('auth:api');
