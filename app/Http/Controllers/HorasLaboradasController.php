<?php

namespace App\Http\Controllers;

use App\HorasLaborada;
use App\HorasLaboradasDetalle;
use Illuminate\Http\Request;
use App\Http\Requests;

class HorasLaboradasController extends Controller
{
    /**
     * @return string
     */
    public function getHorasLaboradasByPlanillaId($planilla_id)
    {
        $horasLaboradasModel = new HorasLaborada();
        $horasLaboradas = $horasLaboradasModel->getByPlanillaId($planilla_id);
        return $this->mapUltimasHorasToHorasLaboradas($horasLaboradas);
    }

    public function mapUltimasHorasToHorasLaboradas($horasLaboradas)
    {
        foreach ($horasLaboradas as $horasLaborada) {
            $horasLaboradasDetallesController = new HorasLaboradasDetallesController();
            $horasLaborada->ultimas_horas = $horasLaboradasDetallesController->getUltimasHorasByHorasLaboradaId($horasLaborada->id);
        }

        return $horasLaboradas;
    }

    public function saveByColaboradorId($id, Request $request)
    {
        foreach($request->horas_laboradas as $horas_laborada) {
            $horasLaborada = new HorasLaborada;
            if (array_key_exists('id', $horas_laborada)) {
                $horasLaborada = $horasLaborada->getById($horas_laborada['id']);
            }
            $horasLaborada->colaborador_id = $horas_laborada['colaborador_id'];
            $horasLaborada->planilla_id = $horas_laborada['planilla_id'];
            $horasLaborada->cuenta_costo_id = $horas_laborada['cuenta_costo_id'];
            $horasLaborada->beneficio_id = $horas_laborada['beneficio_id'];
            $horasLaborada->cuenta_beneficio_id = $horas_laborada['cuenta_beneficio_id'];
            $horasLaborada->save();
            $this->saveDetalles($horasLaborada->id, $horas_laborada['ultimas_horas']);
        };
    }

    public function saveDetalles($horas_laboradas_id, $detalles)
    {
        foreach ($detalles as $detalle) {
            $horaDetalle = new HorasLaboradasDetalle;
            if (array_key_exists('id', $detalle)) {
                $horaDetalle = $horaDetalle->getById($detalle['id']);
            }
            $horaDetalle->horas_laboradas_id = $horas_laboradas_id;
            $horaDetalle->fecha_laborada = $detalle['fecha_laborada'];
            $horaDetalle->horas_laboradas = $detalle['horas_laboradas'];
            $horaDetalle->save();
        }
    }
}
