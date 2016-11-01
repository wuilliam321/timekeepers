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
        return $model->all();
    }
}
