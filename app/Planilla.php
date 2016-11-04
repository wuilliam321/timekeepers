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
    protected $perPage = 10;

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
        if ($paginate_options && array_key_exists('sort_key', $paginate_options)) {
            $sort_key = $paginate_options['sort_key'];
        } else {
            $sort_key = 'id';
        }
        $codigo = '';
        if ($paginate_options && array_key_exists('codigo', $paginate_options)) {
            $codigo = $paginate_options['codigo'];
        }
        if ($paginate_options && array_key_exists('per_page', $paginate_options)) {
            $per_page = $paginate_options['per_page'];
        } else {
            $per_page = $this->perPage;
        }

        if ($codigo) {
            $planillas = $this->getAllByCodigoWithParams($codigo, $sort_key, $sort_direction, $page, $per_page);
        } else {
            $planillas = $this->getAllWithParams($sort_key, $sort_direction, $page, $per_page);
        }

        return $planillas;
    }

    public function getAllWithParams($sortKey, $sortDirection, $page, $per_page)
    {
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
            ->orderBy($sortKey, $sortDirection)
            ->paginate($per_page, ['*'], 'page', $page);
    }

    public function getAllByCodigoWithParams($codigo, $sortKey, $sortDirection, $page, $per_page)
    {
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
            ->where($this->table . '.codigo', '=', $codigo)
            ->orderBy($sortKey, $sortDirection)
            ->paginate($per_page, ['*'], 'page', $page);
    }
}
