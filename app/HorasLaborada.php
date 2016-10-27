<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HorasLaborada extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horas_laboradas';

    public function getByColaboradorId($id)
    {
        return DB::table($this->table)
            ->join('proyectos', 'proyectos.id', '=', $this->table . '.colaborador_id')
            ->join('cuentas_costos', 'cuentas_costos.id', '=', $this->table . '.cuenta_costo_id')
            ->join('beneficios', 'beneficios.id', '=', $this->table . '.beneficio_id')
            ->join('cuentas_beneficios', 'cuentas_beneficios.id', '=', $this->table . '.cuenta_beneficio_id')
            ->select(
                $this->table. '.*',
                'proyectos.nombre as nombre_proyecto',
                'cuentas_costos.nombre as nombre_cuenta_costo',
                'beneficios.nombre as nombre_beneficio',
                'cuentas_beneficios.nombre as nombre_cuenta_beneficio')
            ->where($this->table . '.colaborador_id', '=', $id)
            ->get();
    }
}
