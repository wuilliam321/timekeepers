<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUltimasFechas($limit)
    {
        $dates = [];
        for ($i = 0; $i < $limit; $i++) {
            array_push($dates, date('Y-m-d', strtotime(sprintf(' -%d day', $i))));
        }

        return $dates;
    }
}
