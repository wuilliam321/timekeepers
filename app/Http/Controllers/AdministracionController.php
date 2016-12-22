<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdministracionController extends Controller
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
    public function feriados()
    {
        if (Auth::user()->rol === 'admin') {
            return view('administracion.feriados');
        } else {
            abort(401, 'You have not enough permission to access this site');
        }
    }
}
