<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HorasLaboradasDetalle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horas_laboradas_detalles';

    public function getUltimasByHorasLaboradaId($id, $limit)
    {
        $ultimasFechas = $this->getUltimasFechas($limit);

        $ultimasHoras = DB::table($this->table)
            ->where('horas_laboradas_id', '=', $id)
            ->where('fecha_laborada', '>=', $ultimasFechas[sizeof($ultimasFechas) - 1])
            ->where('fecha_laborada', '<=', $ultimasFechas[0])
            ->orderBy('fecha_laborada', 'asc')
            ->limit($limit)
            ->get();

        return $this->mapUltimasFechasToUltimasHoras($ultimasFechas, $ultimasHoras->toArray());
    }

    public function getUltimasFechas($limit)
    {
        $dates = [];
        for ($i = 0; $i < $limit; $i++) {
            array_push($dates, date('Y-m-d', strtotime(sprintf(' -%d day', $i))));
        }

        return $dates;
    }

    public function mapUltimasFechasToUltimasHoras($fechas, $horas)
    {
        $fechas = array_map(function($fecha) use ($horas) {
            $hora = [];
            if ($horas) {
                $horas = json_decode(json_encode($horas), true);
                $hora = array_filter($horas, function ($hora)  use ($fecha) {
                    return $fecha === $hora['fecha_laborada'];
                });
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
