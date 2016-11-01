<?php

namespace App\Http\Controllers;

use App\CuentasBeneficio;
use Illuminate\Http\Request;
use App\Http\Requests;

class CuentasBeneficiosController extends Controller
{
    public function getAllCuentas()
    {
        $model = new CuentasBeneficio();
        return $model->all();
    }
}
