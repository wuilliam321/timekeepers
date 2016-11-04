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
                $hora = $this->getHorasFromMinutos($hora[0]);
            }

            if (!$hora) {
                return [
                    'fecha_laborada' => $fecha,
                    'horas_laboradas' => 0,
                    'horas' => '',
                    'minutos' => '',
                ];
            } else {
                return $hora[0];
            }
        }, $fechas);

        return array_reverse($fechas);
    }

    public function getHorasFromMinutos($hora)
    {
        $una_hora = 60;
        $horas_laboradas = intval($hora['horas_laboradas']) / $una_hora;
        $horas = floor($horas_laboradas);
        $minutos = ($horas_laboradas - $horas) * $una_hora;

        if ($horas < 10) {
            $horas = '0' . $horas;
        }

        if ($minutos < 10) {
            $minutos = '0' . $minutos;
        }

        $hora['minutos'] = $minutos;
        $hora['horas'] = $horas;

        return [$hora];
    }
}
