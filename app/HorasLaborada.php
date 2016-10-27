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
            ->where('colaborador_id', '=', $id)
            ->get();
    }
}
