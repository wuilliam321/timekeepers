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

Route::get('/planillas', function (App\Planilla $planilla) {
    return DB::table('planillas')
        ->join('colaboradores', 'colaboradores.id', '=', 'planillas.colaborador_id')
        ->join('proyectos', 'proyectos.id', '=', 'planillas.proyecto_id')
        ->select('planillas.*', 'colaboradores.nombre as nombre_colaborador', 'colaboradores.cedula',  'colaboradores.tipo_salario', 'proyectos.nombre as nombre_proyecto')
        ->get();

})->middleware('auth:api');
