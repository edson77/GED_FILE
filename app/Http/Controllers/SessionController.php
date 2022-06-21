<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;

class SessionController extends Controller
{
   public function agentCourrier(){
        $agents = Session::where('role', 'Agent service-courrier')->get();
        return view('dashboard.sessions.agents_courrier', compact('agents'));
    }

    public function all(){
        $agents = Session::all();
        return view('dashboard.sessions.all', compact('agents'));
    }
}
