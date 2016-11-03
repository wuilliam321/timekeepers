<?php

namespace App\Http\Controllers;

use App\CuentasCosto;
use Illuminate\Http\Request;
use App\Http\Requests;

class CuentasCostoController extends Controller
{
    public function getAllCuentas()
    {
        $model = new CuentasCosto();
        $cuentas = $model->all();
        foreach ($cuentas as $index => $cuenta) {
            $cuentas[$index]->nombre = $cuentas[$index]->codigo . ' ' . $cuentas[$index]->nombre;
        }

        return $cuentas;
    }
}
