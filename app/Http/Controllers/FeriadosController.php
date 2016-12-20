<?php

namespace App\Http\Controllers;

use App\Feriado;
use Illuminate\Http\Request;

use App\Http\Requests;

class FeriadosController extends Controller
{
    protected $perPage = 10;
    public function getFeriados()
    {
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
}
