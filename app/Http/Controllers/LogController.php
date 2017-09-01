<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index()
    {
    	$logs = Log::get();
        if (request()->ajax()) {
            $no = 1;
            foreach ($logs as $r) {
                $d['no'] = $no++;
                $d['name'] = ucwords($r->user->name) . " (". $r->user->email .")";
                $d['action'] = ucwords($r->action);
                $d['action_model'] = ucwords($r->action_model);
                $d['action_id'] = $r->action_id;
                $log[] = (object) $d;
            }
            $data = collect($log);
            return response()->json(compact('data'));
        }
        return view('log', compact('logs'));
    }
}
