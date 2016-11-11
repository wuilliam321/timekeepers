<?php

namespace App\Http\Controllers;

use App\HorasLaboradasDetalle;
use Illuminate\Http\Request;
use App\Http\Requests;

class HorasLaboradasDetallesController extends Controller
{
    public function getUltimasHorasByHorasLaboradaId($id)
    {
        $limit = 3;
        $horasLaboradasDetalleModel = new HorasLaboradasDetalle();
        $ultimasFechas = $this->getUltimasFechas($limit);
        $from = $ultimasFechas[sizeof($ultimasFechas) - 1];
        $to = $ultimasFechas[0];
        $horasLaboradasDetalles = $horasLaboradasDetalleModel->getUltimasByHorasLaboradaId($id, $from, $to);
        return $this->mapUltimasFechasToUltimasHoras($ultimasFechas, $horasLaboradasDetalles->toArray());
    }

    public function mapUltimasFechasToUltimasHoras($fechas, $horas)
    {
        $fechas = array_map(function($fecha) use ($horas) {
            $hora = [];
            if ($horas) {
                $horas = json_decode(json_encode($horas), true);
                $hora = array_values(array_filter($horas, function ($hora)  use ($fecha) {
                    return $fecha === $hora['fecha_laborada'];
                }));
            }

            if (!$hora) {
                return [
                    'fecha_laborada' => $fecha,
                    'horas_laboradas' => 0,
                ];
            } else {
                return $hora[0];
            }
        }, $fechas);

        return array_reverse($fechas);
    }
}
