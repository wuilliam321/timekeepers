<?php

namespace App\Http\Controllers;

use App\Beneficio;
use Illuminate\Http\Request;
use App\Http\Requests;

class BeneficiosController extends Controller
{
    public function getAllBeneficios()
    {
        $model = new Beneficio();
        return $model->all();
    }
}
