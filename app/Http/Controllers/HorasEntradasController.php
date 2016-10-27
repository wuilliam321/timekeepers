<?php

namespace App\Http\Controllers;

use App\HorasEntrada;
use Illuminate\Http\Request;
use App\Http\Requests;

class HorasEntradasController extends Controller
{
    public function getHorasEntradasByColaboradorId($id)
    {
        $limit = 3;
        $horasEntradaModel = new HorasEntrada();
        $horasEntradas = $horasEntradaModel->getByColaboradorId($id);
        $ultimasFechas = $this->getUltimasFechas($limit);
        return $this->mapUltimasHorasToHorasEntradas($ultimasFechas, $horasEntradas->toArray());
    }

    public function mapUltimasHorasToHorasEntradas($fechas, $horas)
    {
        $fechas = array_map(function($fecha) use ($horas) {
            $hora = [];
            if ($horas) {
                $horas = json_decode(json_encode($horas), true);
                $hora = array_values(array_filter($horas, function ($hora)  use ($fecha) {
                    return $fecha === $hora['fecha_entrada'];
                }));
            }

            if (!$hora) {
                return [
                    'fecha_entrada' => $fecha,
                    'hora_entrada' => '',
                ];
            } else {
                return $hora[0];
            }
        }, $fechas);

        return array_reverse($fechas);
    }
}
