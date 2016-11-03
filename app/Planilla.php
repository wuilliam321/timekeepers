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

    public function getWithColaboradoresAndProyectos($paginate_options)
    {
        if ($paginate_options && array_key_exists('page', $paginate_options)) {
            $page = $paginate_options['page'];
        } else {
            $page = 1;
        }
        if ($paginate_options && array_key_exists('sort_direction', $paginate_options)) {
            $sort_direction = $paginate_options['sort_direction'];
        } else {
            $sort_direction = 'asc';
        }
        return $this
            ->join('colaboradores', 'colaboradores.id', '=', $this->table . '.colaborador_id')
            ->join('proyectos', 'proyectos.id', '=', $this->table . '.proyecto_id')
            ->select(
                $this->table . '.*',
                $this->table .'.codigo as codigo_planilla',
                'colaboradores.nombre as nombre_colaborador',
                'colaboradores.cedula',
                'colaboradores.tipo_salario',
                'proyectos.nombre as nombre_proyecto')
                ->orderBy($paginate_options['sort_key'], $sort_direction)
            ->paginate(10, ['*'], 'page', $page);;
    }
}
