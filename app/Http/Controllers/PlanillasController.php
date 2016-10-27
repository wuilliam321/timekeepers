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
        $planillaModel = new Planilla();
        return $planillaModel->getWithColaboradoresAndProyectos();

    }
}
