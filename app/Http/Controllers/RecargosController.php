<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessHorasRecargos;
use App\Http\Requests;
use Carbon\Carbon;

class RecargosController extends Controller
{
    public function run()
    {
//        $job = (())->delay(Carbon::now()->addMinutes(1));

        dispatch((new ProcessHorasRecargos)->delay(10));
    }
}
