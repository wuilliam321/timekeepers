<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planillas';

    public function getWithColaboradoresAndProyectos()
    {
        return $this
            ->join('colaboradores', 'colaboradores.id', '=', $this->table . '.colaborador_id')
            ->join('proyectos', 'proyectos.id', '=', $this->table . '.proyecto_id')
            ->select(
                $this->table . '.*',
                'colaboradores.nombre as nombre_colaborador',
                'colaboradores.cedula',
                'colaboradores.tipo_salario',
                'proyectos.nombre as nombre_proyecto')
            ->get();
    }
}
