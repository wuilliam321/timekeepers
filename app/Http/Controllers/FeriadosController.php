<?php

namespace App\Http\Controllers;

use App\Feriado;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class FeriadosController extends Controller
{
    protected $perPage = 10;
    public function getFeriados()
    {
        if (Auth::user()->rol !== 'admin') {
            abort(401, 'You have not enough permission to access this site');
        }
        $paginate_options = $_GET;
        $sort_direction = 'asc';
        $sort_key = 'fecha';
        if ($paginate_options && array_key_exists('sort_direction', $paginate_options)) {
            $sort_direction = $paginate_options['sort_direction'];
        }
        if ($paginate_options && array_key_exists('sort_key', $paginate_options)) {
            $sort_key = $paginate_options['sort_key'];
        }
        return Feriado::orderBy($sort_key, $sort_direction)->paginate($this->perPage);
    }

    public function createFeriado(Request $request)
    {
        if (Auth::user()->rol !== 'admin') {
            abort(401, 'You have not enough permission to access this site');
        }
        $data = $request->all();
        $feriado = Feriado::where('fecha', '=', $data['fecha'])->get();
        if (sizeof($feriado)) {
            abort(409, 'Duplicated Entry');
        } else {
            $feriado = new Feriado();
            $feriado->fecha = $data['fecha'];
            $feriado->save();
            return $feriado;
        }
    }

    public function updateFeriado(Request $request, $id)
    {
        if (Auth::user()->rol !== 'admin') {
            abort(401, 'You have not enough permission to access this site');
        }
        $data = $request->all();
        $feriado = Feriado::where('fecha', '=', $data['fecha'])->get();
        if (sizeof($feriado)) {
            abort(409, 'Duplicated Entry');
        } else {
            $feriado = Feriado::find($id);
            if ($feriado) {
                $feriado->fecha = $data['fecha'];
                $feriado->save();
            }
            return $feriado;
        }
    }

    public function deleteFeriado(Request $request, $id)
    {
        if (Auth::user()->rol !== 'admin') {
            abort(401, 'You have not enough permission to access this site');
        }
        if ($request->isMethod('delete') && $id) {
            $deleted = Feriado::where('id', '=', $id)->delete();
            if ($deleted) {
                return response('Deleted', 200);
            } else {
                abort(409, 'Duplicated Entry');
            }
        }
        abort(401);
    }
}
