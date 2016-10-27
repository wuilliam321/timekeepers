<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorasEntrada extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horas_entrada';

    public function getByColaboradorId($id)
    {
        return $this->where('colaborador_id', '=', $id)
            ->orderBy('fecha_entrada', 'asc')
            ->get();
    }
}
