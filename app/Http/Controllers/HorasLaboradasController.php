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
        return $horasLaboradasModel->getByColaboradorId($id);
    }
}
