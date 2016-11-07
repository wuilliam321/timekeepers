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
                    'horas' => '',
                    'minutos' => ''
                ];
            } else {
                $splittedHora = explode(':', $hora[0]['hora_entrada']);
                $hora[0]['horas'] = $splittedHora[0];
                $hora[0]['minutos'] = $splittedHora[1];
                $hora[0]['horas_entrada'] = $this->getFixedHoras($hora[0]);
                return $hora[0];
            }
        }, $fechas);

        return array_reverse($fechas);
    }

    public function saveByColaboradorId($id, Request $request)
    {
        foreach($request->horas_entrada as $hora_entrada) {
            if ($hora_entrada['horas'] !== '' && $hora_entrada['minutos'] !== '') {
                $horaEntrada = new HorasEntrada;
                if (array_key_exists('id', $hora_entrada)) {
                    $horaEntrada = $horaEntrada->getById($hora_entrada['id']);
                } else {
                    $horaEntrada->fecha_entrada = $hora_entrada['fecha_entrada'];
                    $horaEntrada->colaborador_id = $id;
                }
                $horaEntrada->hora_entrada = $this->getFixedHoras($hora_entrada);
                $dirtyFields = ($horaEntrada->isDirty()) ? $horaEntrada->getDirty() : [];
                $isNew = !$horaEntrada->exists;
                $saveResult = $horaEntrada->save();
                if ($saveResult) {
                    if ($isNew) {
                        HorasLogsController::log('add', $horaEntrada, $horaEntrada->toArray());
                    } else {
                        if (sizeof($dirtyFields)) {
                            HorasLogsController::log('update', $horaEntrada, $dirtyFields);
                        }
                    }
                }
            }
        }
        return $this->getHorasEntradasByColaboradorId($id);
    }

    public function getFixedHoras($hora_entrada)
    {
        $horas = intval($hora_entrada['horas']);
        $minutos = intval($hora_entrada['minutos']);

        if ($horas < 10) {
            $horas = '0' . $horas;
        }

        if ($minutos < 10) {
            $minutos = '0' . $minutos;
        }

        return $horas . ':' . $minutos;
    }
}
