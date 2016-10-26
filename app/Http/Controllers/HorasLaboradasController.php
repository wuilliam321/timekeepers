<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class HorasLaboradasController extends Controller
{
    /**
     * @return string
     */
    public function getHorasLaboradasWithLastDates($id)
    {
        return DB::table('horas_laboradas')
            ->where('colaborador_id', '=', $id)
            ->get();
    }
}
