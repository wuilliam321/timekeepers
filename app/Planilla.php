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
        $text = '';
        if ($paginate_options && array_key_exists('text', $paginate_options)) {
            $text = $paginate_options['text'];
        }
        if ($paginate_options && array_key_exists('per_page', $paginate_options)) {
            $per_page = $paginate_options['per_page'];
        } else {
            $per_page = $this->perPage;
        }

        if ($codigo) {
            $planillas = $this->getAllByCodigoWithParams($codigo, $sort_key, $sort_direction, $page, $per_page, $text);
        } else {
            $planillas = $this->getAllWithParams($sort_key, $sort_direction, $page, $per_page, $text);
        }

        return $planillas;
    }

    public function getAllWithParams($sortKey, $sortDirection, $page, $per_page, $text)
    {
        $query = $this
            ->join('colaboradores', 'colaboradores.id', '=', $this->table . '.colaborador_id')
            ->join('proyectos', 'proyectos.id', '=', $this->table . '.proyecto_id')
            ->select(
                $this->table . '.*',
                $this->table .'.codigo as codigo_planilla',
                'colaboradores.nombre as nombre_colaborador',
                'colaboradores.cedula',
                'colaboradores.tipo_salario',
                'proyectos.nombre as nombre_proyecto');
        if ($text) {
            $like_text = '%' . $text . '%';
            $query->where('colaboradores.nombre', 'LIKE', $like_text)
                ->orWhere('colaboradores.cedula', 'LIKE', $like_text)
                ->orWhere('colaboradores.tipo_salario', 'LIKE', $like_text)
                ->orWhere('proyectos.nombre', 'LIKE', $like_text);
        }
        return $query->orderBy($sortKey, $sortDirection)
            ->paginate($per_page, ['*'], 'page', $page);
    }

    public function getAllByCodigoWithParams($codigo, $sortKey, $sortDirection, $page, $per_page, $text)
    {
        $query = $this
            ->join('colaboradores', 'colaboradores.id', '=', $this->table . '.colaborador_id')
            ->join('proyectos', 'proyectos.id', '=', $this->table . '.proyecto_id')
            ->select(
                $this->table . '.*',
                $this->table .'.codigo as codigo_planilla',
                'colaboradores.nombre as nombre_colaborador',
                'colaboradores.cedula',
                'colaboradores.tipo_salario',
                'proyectos.nombre as nombre_proyecto')
            ->where($this->table . '.codigo', '=', $codigo);
        if ($text) {
            $like_text = '%' . $text . '%';
            $query->where('colaboradores.nombre', 'LIKE', $like_text)
                ->orWhere('colaboradores.cedula', 'LIKE', $like_text)
                ->orWhere('colaboradores.tipo_salario', 'LIKE', $like_text)
                ->orWhere('proyectos.nombre', 'LIKE', $like_text);
        }
        return $query->orderBy($sortKey, $sortDirection)
            ->paginate($per_page, ['*'], 'page', $page);
    }
}
