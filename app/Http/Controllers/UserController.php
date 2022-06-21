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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /*public function login(Request $request)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $time = time() +3600;

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        if(Auth::attempt($request->only(['username', 'password'])))  {
           $session_c = Session::where('user_id', Auth::user()->id)->first();
            if ($session_c != null) {
                Auth::logout();

                return back()->withErrors(['message' => 'Une session est déjà ouverte avec votre compte!Veuillez contacter le super administrateur']);
            } else {
                if (Auth::user()->deleted == 0) {
                  //  $pass = bcrypt('Arianelove103041992');
                   // dd($pass);
                 //  $code = new Code();
                  // $code->secret = $pass;
                  // $code->save();
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
            }
        } else {
            return back()->withErrors(['message' => 'Nom d\'utilisateur ou mot de passe incorrect!']);
        }
    }*/
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

    public function logout()
    {
        $log = new Log();
        $log->libelle = 'Déconnection de l\'utilisateur '.Auth::user()->name.' '.Auth::user()->role;
        $log->auteur = Auth::user()->id;
        $log->save();
       /* $session = DB::update("UPDATE sessions SET last_activity = 0 WHERE user_agent = :user_agent AND user_id = :user_id AND ip_address = :ip_address AND  last_activity = :last_activity",
    
        [
            'user_agent'=>,
            ''=>,
            ''=>,
            ''=>
        ]
        );*/
        
        
        //Session::where('user', Auth::user()->id)->first();
        
        Auth::logout();

        return redirect()->route('login');
    }

    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if( isset($user->id)){
            return view('dashboard.users.show', compact('user'));
        }
        return redirect()->back();

        
    }

    public function create()
    {
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();
        //dd($sous_direction);
        return view('dashboard.users.create', compact('direction', 'sous_direction', 'service'));
    }

    public function param($id, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ], [
            'confirmed' => 'Les mots de passes ne correspondent pas',
            'min:6' => 'Le mot de passe doit contenir au moins 6 caractéres',
        ]);
        $user = User::find($id);
        $user['username'] = $request->username;
        $user['password'] = bcrypt($request->password);
        if ($user->update()) {
            $data = array(
                'name' => $user->name,
                'username' => $user->username,
                'password' => $request->password,
                'email' => $user->email,
            );
            try {
                Mail::send('dashboard.users.mail1', $data, function ($message) use ($data) {
                    $message->from('gedsed2019@gmail.com', 'GED SED');
                    $message->to($data['email'])->subject('Vos nouveaux identifiants de connexion sur la plate-forme GEDSED');
                });
            } catch (Exception $e) {
            }
            $log = new Log();
            $log->libelle = 'Paramétres de connexion modifiés (nom de l\'utilisateur: '.$user->nom.' nom d\'utilisateur : '.$user->username.')';
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Identifiants de connexion modifiés avec succès!');
        } else {
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'matricule' => 'required',
            'destinataire' => 'required',
            'profil' => 'mimes:jpeg,jpg,png,gif|max:100000',
            'password' => 'required|min:6|confirmed',
        ], [
            'confirmed' => 'Les mots de passes ne correspondent pas',
            'min:6' => 'Le mot de passe doit contenir au moins 6 caractéres',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->matricule = $request->matricule;
        $user->sexe = $request->sexe;
        $user->role = $request->role;
        $user->naissance = $request->naissance;
        $user->telephone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->username = $request->username;
        if ($request->destinataire != null) {
            $destination = explode('-', $request->destinataire);
            if ($destination[1] == 'direction') {
                $user->direction = $destination[0];
            } else {
                $user->service = $destination[0];
            }
        }

        if ($request->hasfile('profil')) {
            $file = $request->file('profil');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('img/', $filename);
            $user->profil = 'img/'.$filename;
        }

        if ($user->save()) {
            $data = array(
                'name' => $user->name,
                'username' => $user->username,
                'password' => $request->password,
                'email' => $user->email,
            );
            try {
               // Mail::to($data['email'])->send(new contactMail());
                Mail::send('dashboard.users.mail', $data, function ($message) use ($data) {
                    $message->from('gedsed2019@gmail.com', 'GED SED');
                    $message->to($data['email'])->subject('Vos identifiants de connexion');
                });
            } catch (Exception $e) {
                
            }
            $log = new Log();
            $log->libelle = 'Nouveau compte utilisateur crée (nom de l\'utilisateur: '.$user->nom.' nom d\'utilisateur : '.$user->username.')';
            $log->auteur = Auth::user()->id;
            $log->save();
            return 'c est bon';
           // return back()->withSuccess('Compte utilisateur créé avec succès!');
        } else {
            return 'c est bon';
           // return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();

        return view('dashboard.users.edit', compact('user', 'direction', 'sous_direction', 'service'));
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'destinataire' => 'required',
        ]);

        if ($request->destinataire != null) {
            $destination = explode('-', $request->destinataire);

            if ($destination[1] == 'direction') {
                $input['direction'] = $destination[0];
            } else {
                $input['service'] = $destination[0];
            }
        }

        if ($user->update($input)) {
            return back()->withSuccess('Informations de l\'utilisateur mis à jour avec succès!');
        } else {
            return back()->withErrors(['Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function desactivate($id)
    {
        $user = User::find($id);
        $user['deleted'] == 0 ? $user['deleted'] = 1 : $user['deleted'] = 0;
        if ($user->update()) {
            $user->deleted == 0 ? $message = 'Réactivé' : $message = 'Désactivé';
            $log = new Log();
            if ($user->deleted == 0) {
                $log->libelle = 'Réactivation du compte utilisateur: username'.$user->username;
            } else {
                $log->libelle = 'Désactivation du compte utilisateur: username'.$user->username;
            }
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Compte utilisateur '.$message.' avec succès!');
        } else {
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function deleted($id)
    {
        $user = User::find($id);
        $user['deleted'] == 0 ? $user['deleted'] = 1 : $user['deleted'] = 0;
        if ($user->update()) {
            if ($user->deleted == 0) {
                $message = 'Réactivé';
            } else {
                $message = 'Supprimé';
            }

            return back()->withSuccess('Utilisateur '.$message.' avec succès!');
        } else {
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }
    //afficher le compte de l'auth
    public function showAuthUser()
    {
        $id = Auth::user()->id;
        
        $user = User::find($id);

        return view('dashboard.users.showAuthUser', compact('user'));
    }
}
