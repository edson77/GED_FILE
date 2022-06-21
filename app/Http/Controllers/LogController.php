<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Courrier;
use App\Log;

class LogController extends Controller
{
    public function index(){
        $logs = Log::all();
        return view('dashboard.logs.index', compact('logs'));
    }

    public function log(Request $request){
        $courrier = courrier::find($request->id);
        $log = new Log();
        $log->libelle = 'La date de relance du courrier '.$courrier->code.' a été vu par: ';
        $log->auteur = Auth::user()->id;
        $log->save();
        return back();
    }
}
