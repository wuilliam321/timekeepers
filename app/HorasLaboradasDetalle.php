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

    public function getById($id)
    {
        return $this->findOrFail($id);
    }

    public function getUltimasByHorasLaboradaId($id, $from, $to)
    {
        return $this->where('horas_laborada_id', '=', $id)
            ->where('fecha_laborada', '>=', $from)
            ->where('fecha_laborada', '<=', $to)
            ->orderBy('fecha_laborada', 'asc')
            ->get();
    }

    public function horas_laborada()
    {
        return $this->belongsTo('App\HorasLaborada');
    }
}
