<?php

namespace App\Http\Controllers;

use App\Code;
use App\Log;
use App\User;
use Exception;
use App\Service;
use App\Session;
use App\Direction;
use Carbon\Carbon;
use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    
    public function  __construct(){
        if (isset(Auth::user()->id)) {
        	maRedirection();
        }
    }

    public function maRedirection()
    {
    	return redirect()->route('home');
    }

    public function login1()
    {
        
        //dd($date);
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $time = time() +3600;
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
       // if (Auth::attempt($request->only(['username', 'password'])))
        if(Auth::attempt(['username' => $request->username,'password' => $request->password])) {
        
                if (Auth::user()->deleted == 0) {
                  
                    $log = new Log();
                    $log->libelle = 'Authentification de l\'utilisateur '.Auth::user()->name.' '.Auth::user()->role;
                    $log->auteur = Auth::user()->id;
                    $log->save();
                    
                    $session = new Session();
                    $session->id = 'sessions_'.time();
                    $session->user_id = Auth::user()->id;
                    $session->role = Auth::user()->role;
                    $session->ip_address = $ip;
                    $session->user_agent = $agent;
                    $session->last_activity =$time;
                    $session->created_at = Carbon::now();
                    $session->updated_at = Carbon::now();
                    $session->save();

                    return redirect('/home');
                } else {
                    Auth::logout();

                    return back()->withErrors(['message' => 'Votre compte utilisateur est désactivé, veuillez contacter le super administrateur!']);
                }
           // }
        } else {
            return back()->withErrors(['message' => 'Nom d\'utilisateur ou mot de passe incorrect!']);
        }
    }
}
