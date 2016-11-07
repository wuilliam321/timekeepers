<?php

namespace App\Http\Controllers;

use App\HorasLog;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HorasLogsController extends Controller
{
    static function log($action = 'add', $model, $changedFields = [])
    {
        $data = [
            'table' => with($model)->getTable(),
            'value' => \GuzzleHttp\json_encode($changedFields),
            'action' => $action,
            'user' => Auth::user()->id
        ];
        $logger = new HorasLog;
        $logger->table = $data['table'];
        $logger->value = $data['value'];
        $logger->action = $data['action'];
        $logger->user = $data['user'];

        $logger->save();
    }
}
