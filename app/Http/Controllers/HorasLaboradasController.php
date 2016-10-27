<?php

namespace App\Http\Controllers;

use App\HorasLaborada;
use Illuminate\Http\Request;
use App\Http\Requests;

class HorasLaboradasController extends Controller
{
    /**
     * @return string
     */
    public function getHorasLaboradasByColaboradorId($id)
    {
        $horasLaboradasModel = new HorasLaborada();
        $horasLaboradas = $horasLaboradasModel->getByColaboradorId($id);
//        return $horasLaboradas;
        return $this->mapUltimasHorasToHorasLaboradas($horasLaboradas);
    }

    public function mapUltimasHorasToHorasLaboradas($horasLaboradas)
    {
        foreach ($horasLaboradas as $horasLaborada) {
            $horasLaboradasDetallesController = new HorasLaboradasDetallesController();
            $horasLaborada->ultimas_horas = $horasLaboradasDetallesController->getUltimasHorasByHorasLaboradaId($horasLaborada->id, 3);
        }

        return $horasLaboradas;
    }
}
