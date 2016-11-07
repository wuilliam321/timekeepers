<?php

namespace App\Http\Controllers;

use App\Planilla;
use Illuminate\Http\Request;

class PlanillasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('planillas.index');
    }

    public function getPlanillas() {
        $paginate_options = $_GET;
        $planillaModel = new Planilla();
        $planillas = $planillaModel->getWithColaboradoresAndProyectos($paginate_options);
        return $this->mergeWithHoras($planillas);

    }

    public function getPlanillasFilters() {
        $planillaModel = new Planilla();
        $planillas = $planillaModel->getWithColaboradoresAndProyectos(['per_page' => 99999]);
        return $this->mergeWithHoras($planillas);

    }

    public function mergeWithHoras($planillas)
    {
        $horasEntradasController = new HorasEntradasController;
        $horasLaboradasController = new HorasLaboradasController;
        foreach ($planillas as $planilla) {
            $planilla['horas_entrada'] = $horasEntradasController->getHorasEntradasByColaboradorId($planilla['colaborador_id']);
            $planilla['horas_laboradas'] = $horasLaboradasController->getHorasLaboradasByPlanillaId($planilla['id']);
        }
        return $planillas;
    }
}
