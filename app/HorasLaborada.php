<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorasLaborada extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horas_laboradas';

    public function getById($id)
    {
        return $this->findOrFail($id);
    }

    public function getByPlanillaId($planilla_id)
    {
        return $this->where($this->table . '.planilla_id', '=', $planilla_id)
            ->get();
    }

    public function horas_laboradas_detalles()
    {
        return $this->hasMany('App\HorasLaboradasDetalle');
    }
}
