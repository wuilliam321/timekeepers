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
            $this->setUltimasHoras($horasLaborada);
        }

        return $horasLaboradas;
    }

    public function setUltimasHoras(&$horasLaborada)
    {
        $horasLaboradasDetallesController = new HorasLaboradasDetallesController();
        $horasLaborada->ultimas_horas = $horasLaboradasDetallesController->getUltimasHorasByHorasLaboradaId($horasLaborada->id);
    }

    public function saveByColaboradorId($id, Request $request)
    {
        $dirtyFields = [];
        $isNew = false;
        $returnMsg = ['update' => false, 'add' => false];
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
            $ultimas_horas = $horas_laborada['ultimas_horas'];
            $dirtyFields = ($horasLaborada->isDirty()) ? $horasLaborada->getDirty() : [];
            $isNew = !$horasLaborada->exists;
            $saveResult = $horasLaborada->save();
            if ($saveResult) {
                if ($isNew) {
                    HorasLogsController::log('add', $horasLaborada, $horasLaborada->toArray());
                } else {
                    if (sizeof($dirtyFields)) {
                        HorasLogsController::log('update', $horasLaborada, $dirtyFields);
                    }
                }
            }
            $horasLaborada->ultimas_horas = $ultimas_horas;
            $this->saveDetalles($horasLaborada, $horas_laborada, $returnMsg);
        };
        if ($isNew) {
            $returnMsg['add'] = true;
        }
        if (sizeof($dirtyFields)) {
            $returnMsg['update'] = true;
        }

        if ($isNew || sizeof($dirtyFields)) {
            return array_merge($this->getHorasLaboradasByPlanillaId($id)->toArray(), $returnMsg);
        } else {
            return $returnMsg;
        }
    }

    public function saveDetalles(&$horasLaborada, $horas_laboradas, &$returnMsg)
    {
        $horas_laborada_id = $horasLaborada->id;
        $detalles = $horas_laboradas['ultimas_horas'];
        $ultimas_horas = [];
        foreach ($detalles as $key => $detalle) {
            $horaDetalle = new HorasLaboradasDetalle;
            if (array_key_exists('id', $detalle)) {
                $horaDetalle = $horaDetalle->getById($detalle['id']);
            }
            $horaDetalle->horas_laborada_id = $horas_laborada_id;
            $horaDetalle->fecha_laborada = $detalle['fecha_laborada'];
            $horaDetalle->horas_laboradas = floatval($detalle['horas_laboradas']);
            $dirtyFields = ($horaDetalle->isDirty()) ? $horaDetalle->getDirty() : [];
            $isNew = !$horaDetalle->exists;
            $saveResult = $horaDetalle->save();
            if ($saveResult) {
                if ($isNew) {
                    HorasLogsController::log('add', $horaDetalle, $horaDetalle->toArray());
                } else {
                    if (sizeof($dirtyFields)) {
                        HorasLogsController::log('update', $horaDetalle, $dirtyFields);
                    }
                }
            }
            if ($isNew) {
                $returnMsg['add'] = true;
            }
            if (sizeof($dirtyFields)) {
                $returnMsg['update'] = true;
            }
            array_push($ultimas_horas, $horaDetalle);
        }
        $horasLaborada->ultimas_horas = $ultimas_horas;
    }

    public function deleteById($id)
    {
        $horasLaboradas = new HorasLaborada();
        $horaLaborada = $horasLaboradas->getById($id);
        $this->setUltimasHoras($horaLaborada);
        $horaLaboradaBackup = $horaLaborada;
        $saveResult = $horaLaborada->delete();
        if ($saveResult) {
            HorasLogsController::log('delete', $horaLaboradaBackup, $horaLaboradaBackup->toArray());
        }
    }
}
