<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorasLaboradasDetalle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horas_laboradas_detalles';

    public function getUltimasByHorasLaboradaId($id, $from, $to)
    {
        return $this->where('horas_laboradas_id', '=', $id)
            ->where('fecha_laborada', '>=', $from)
            ->where('fecha_laborada', '<=', $to)
            ->orderBy('fecha_laborada', 'asc')
            ->get();
    }
}