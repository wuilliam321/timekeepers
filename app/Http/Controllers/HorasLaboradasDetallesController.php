<?php

namespace App\Http\Controllers;

use App\HorasLaboradasDetalle;
use Illuminate\Http\Request;
use App\Http\Requests;

class HorasLaboradasDetallesController extends Controller
{
    public function getUltimasHorasByHorasLaboradaId($id, $ultimas)
    {
        $horasLaboradasDetalle = new HorasLaboradasDetalle();
        return $horasLaboradasDetalle->getUltimasByHorasLaboradaId($id, $ultimas);
    }
}
