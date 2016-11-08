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
            'object_id' => $model['id'],
            'value' => \GuzzleHttp\json_encode($changedFields),
            'action' => $action,
            'user' => Auth::user()->id
        ];
        $logger = new HorasLog;
        $logger->table = $data['table'];
        $logger->object_id = $data['object_id'];
        $logger->value = $data['value'];
        $logger->action = $data['action'];
        $logger->user = $data['user'];

        $logger->save();
    }

    public function view()
    {
        $logger = new HorasLog;
        $logs = $logger->all();
        foreach ($logs as &$log) {
            $log->value = \GuzzleHttp\json_decode($log->value);
        }

        return $logs;
    }
}
