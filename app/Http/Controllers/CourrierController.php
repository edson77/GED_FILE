<?php

namespace App\Http\Controllers;

use App\Log;
use App\Service;
use App\Courrier;
use App\Direction;
use Carbon\Carbon;
use App\Notification;
use App\CourrierDeleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //courrier public
    public function index()
    {
        $courriers = Courrier::where('nature', 0)->orderBy('created_at', 'desc')->limit(100)->get();

        

        return view('dashboard.courriers.publics.index', compact('courriers'));
    }

    public function delete()
    {
        $courriers = Courrier::where('deleted', 1)->where('nature', 0)->limit(100)->get();
        foreach ($courriers as $item) {
            $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'desc')->first();
            // $item->by = $by->id_suppresseur;
        }

        return view('dashboard.courriers.publics.delete', compact('courriers'));
    }

    public function searchPublic(Request $request)
    {
        if ($request->naturecourrier == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément de recherche!']);
        } else {
            if ($request->naturecourrier != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('naturecourrier', $request->naturecourrier)->
                                where('type', $request->type)->where('mention', $request->mention)->where('nature', 0)->limit(500)->get();
                    } else {
                        $courriers = Courrier::where('naturecourrier', $request->naturecourrier)->
                            where('type', $request->type)->where('nature', 0)->limit(500)->
                            get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('naturecourrier', $request->naturecourrier)->
                            where('mention', $request->mention)->where('nature', 0)->limit(500)->get();
                    } else {
                        $courriers = Courrier::where('naturecourrier', $request->naturecourrier)->where('nature', 0)->
                            get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                            where('mention', $request->mention)->where('nature', 0)->limit(500)->
                            get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->where('nature', 0)->limit(500)->get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                            where('nature', 0)->limit(500)->get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.publics.result', compact('courriers'));
    }

    //courrier confidentiel
    public function courrier_confidentiel()
    {
        $courriers = Courrier::where('nature', 1)->where('categorie', 'Courrier confidentiel')->orderBy('created_at', 'asc')->get();

        return view('dashboard.courriers.confidentiels.index', compact('courriers'));
    }

    public function confidentiel_deleted()
    {
        $courriers = Courrier::where('deleted', 1)->where('nature', 1)->where('categorie', 'Courrier confidentiel')->get();
        foreach ($courriers as $item) {
            $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
            $item->by = $by->id_suppresseur;
        }

        return view('dashboard.courriers.confidentiels.deleted', compact('courriers'));
    }

    public function searchConfidentiels(Request $request)
    {
        if ($request->type == null && $request->mention == null && $request->categorie == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                                where('type', $request->type)->
                                where('mention', $request->mention)->where('categorie', 'Courrier confidentiel')->limit(500)->
                                get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->where('categorie', 'Courrier confidentiel')->
                            get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                            where('mention', $request->mention)->where('categorie', 'Courrier confidentiel')->limit(500)->
                            get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->where('categorie', 'Courrier confidentiel')->
                            get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                            where('mention', $request->mention)->where('categorie', 'Courrier confidentiel')->limit(500)->
                            get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->where('categorie', 'Courrier confidentiel')->
                            get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                            where('categorie', 'Courrier confidentiel')->
                            get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.confidentiels.result', compact('courriers'));
    }

    //correspondancce confidentielle
    public function courrier_correspondance()
    {
        $courriers = Courrier::where('nature', 1)->where('categorie', 'Correspondance confidentielle')->orderBy('created_at', 'asc')->limit(200)->get();

        return view('dashboard.courriers.correspondances.index', compact('courriers'));
    }

    public function correspondance_deleted()
    {
        $courriers = Courrier::where('deleted', 1)->where('nature', 1)->where('categorie', 'Correspondance confidentielle')->orderBy('created_at', 'asc')->limit(300)->get();
        foreach ($courriers as $item) {
            $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
            $item->by = $by->id_suppresseur;
        }

        return view('dashboard.courriers.correspondances.deleted', compact('courriers'));
    }

    public function searchCorrespondance(Request $request)
    {
        if ($request->categorie == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->
                            where('mention', $request->mention)->where('categorie', 'Correspondance confidentielle')->limit(500)->
                            get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('categorie', 'Correspondance confidentielle')->limit(500)->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('categorie', 'Correspondance confidentielle')->limit(500)->
                        get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->where('categorie', 'Correspondance confidentielle')->
                        get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('categorie', 'Correspondance confidentielle')->
                        get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->where('categorie', 'Correspondance confidentielle')->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                        where('categorie', 'Correspondance confidentielle')->
                        get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.correspondances.result', compact('courriers'));
    }

    //courrier direction, service, bureau
    public function courrier_direction()
    {
        if (Auth::user()->direction != null) {
            $courriers = Courrier::where('direction', Auth::user()->direction)->orderBy('created_at', 'asc')->limit(100)->get();
        } elseif (Auth::user()->service != null) {
            $courriers = Courrier::where('service', Auth::user()->service)->orderBy('id', 'asc')->get();
        } else {
            $courriers = Courrier::where('direction', Auth::user()->direction)->orderBy('created_at', 'asc')->get();
        }

        return view('dashboard.courriers.direction.direction', compact('courriers'));
    }

    public function direction_deleted()
    {
        if (Auth::user()->direction != null) {
            $courriers = Courrier::where('direction', Auth::user()->direction)->where('deleted', 1)->orderBy('created_at', 'asc')->get();
            foreach ($courriers as $item) {
                $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
                $item->by = $by->id_suppresseur;
            }
        } elseif (Auth::user()->service != null) {
            $courriers = Courrier::where('service', Auth::user()->service)->where('deleted', 1)->orderBy('created_at', 'asc')->get();
            foreach ($courriers as $item) {
                $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
                $item->by = $by->id_suppresseur;
            }
        } else {
            $courriers = Courrier::where('direction', Auth::user()->direction)->where('deleted', 1)->orderBy('created_at', 'asc')->get();
            foreach ($courriers as $item) {
                $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
                $item->by = $by->id_suppresseur;
            }
        }

        return view('dashboard.courriers.direction.direction_deleted', compact('courriers'));
    }

    public function searchDirection(Request $request)
    {
        if ($request->categorie == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->
                            where('mention', $request->mention)->where('direction', Auth::user()->direction)->
                            get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->
                            where('mention', $request->mention)->where('service', Auth::user()->service)->
                            get();
                        }
                    } else {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('service', Auth::user()->service)->
                        get();
                        }
                    }
                } else {
                    if ($request->mention != null) {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('service', Auth::user()->service)->
                        get();
                        }
                    } else {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::where('categorie', $request->categorie)->where('service', Auth::user()->service)->
                        get();
                        }
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('service', Auth::user()->service)->
                        get();
                        }
                    } else {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('type', $request->type)->where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier:: where('type', $request->type)->
                        where('service', Auth::user()->service)->
                        get();
                        }
                    }
                } else {
                    if ($request->mention != null) {
                        if (Auth::user()->direction != null) {
                            $courriers = Courrier::where('mention', $request->mention)->
                        where('direction', Auth::user()->direction)->
                        get();
                        } elseif (Auth::user()->service != null) {
                            $courriers = Courrier::
                        where('mention', $request->mention)->where('service', Auth::user()->service)->
                        get();
                        }
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.direction.result', compact('courriers'));
    }

    //courrier interne
    public function index_interne()
    {
        $courriers = Courrier::where('nature', 1)->orderBy('created_at', 'asc')->limit(100)->get();

        return view('dashboard.courriers.internes.index', compact('courriers'));
    }

    public function delete_interne()
    {
        $courriers = Courrier::where('deleted', 1)->where('nature', 1)->get();
        foreach ($courriers as $item) {
            $by = CourrierDeleted::where('id_original', $item->id)->orderBy('created_at', 'asc')->first();
            $item->by = $by->id_suppresseur;
        }

        return view('dashboard.courriers.internes.deleted', compact('courriers'));
    }

    public function searchInterne(Request $request)
    {
        if ($request->categorie == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->
                            where('mention', $request->mention)->where('nature', 1)->
                            get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('nature', 1)->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('nature', 1)->
                        get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->where('nature', 1)->
                        get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('nature', 1)->
                        get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->where('nature', 1)->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                        where('nature', 1)->
                        get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.internes.result', compact('courriers'));
    }

    //courrier Dossier disciplinaire

    public function service_discipline()
    {
        $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->orderBy('created_at', 'asc')->limit(100)->get();

        return view('dashboard.courriers.services_disciplines.index', compact('courriers'));
    }

    public function service_discipline_deleted()
    {
        $courriers = Courrier::where('categorie', 'Dossier disciplinaire')->where('nature', 1)->orderBy('created_at', 'asc')->where('deleted', 1)->get();

        return view('dashboard.courriers.services_disciplines.deleted', compact('courriers'));
    }

    public function searchServiceDiscipline(Request $request)
    {
        if ($request->categorie == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                            where('type', $request->type)->
                            where('mention', $request->mention)->where('categorie', 'Dossier disciplinaire')->
                            get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('categorie', 'Dossier disciplinaire')->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('categorie', 'Dossier disciplinaire')->
                        get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->where('categorie', 'Dossier disciplinaire')->
                        get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('categorie', 'Dossier disciplinaire')->
                        get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->where('categorie', 'Dossier disciplinaire')->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                        where('categorie', 'Dossier disciplinaire')->
                        get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.services_disciplines.result', compact('courriers'));
    }

    //courrier Service

    public function courrierService($id)
    {
        $courriers = Courrier::where('service', $id)->get();
        $service = Service::find($id);

        return view('dashboard.courriers.services.index', compact('courriers', 'service'));
    }

    //Courrier sous division
    public function subdiv($id)
    {
        $courriers = Courrier::where('direction', $id)->get();
        $direction = Direction::find($id);

        return view('dashboard.courriers.subdiv', compact('courriers', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(strtotime('2020-04-06 07:55:00'));
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();

        return view('dashboard.courriers.create', compact('direction', 'sous_direction', 'service'));
    }

    public function create_interne()
    {
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();

        return view('dashboard.courriers.create_interne', compact('direction', 'sous_direction', 'service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ordre' => 'required',
            //'numero' => 'required',
            'fichier' => 'mimes:pdf|max:100000',
        ]);

        $courrier = new Courrier();
        $courrier->entreprise = $request->entreprise;
        $courrier->naturecourrier = $request->naturecourrier;
        $courrier->recepteur = Auth::user()->id;
        $courrier->signataire = $request->signataireExt;
        $courrier->coursier = $request->coursier;
        $courrier->type = $request->type;
        $courrier->numero = $request->numero;
        $courrier->ordre = $request->ordre;
        $courrier->contenu = $request->contenu;
        $courrier->objet = $request->objet;
        $courrier->reception = $request->reception;
        $courrier->relance = $request->relance;
        $courrier->sortie = $request->reception;
        $courrier->mention = $request->mention;
        $courrier->nature = 0;
        if ($request->destinataire != null) {
            $destination = explode('-', $request->destinataire);

            if ($destination[1] == 'direction') {
                $courrier->direction = $destination[0];
            } else {
                $courrier->service = $destination[0];
            }
        }

        if ($request->hasfile('fichier')) {
            $file = $request->file('fichier');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('courriers/', $filename);
            $courrier->fichier = 'courriers/'.$filename;
        }

        $courrier->code = str_random(8);
        /* if ($request->reception > $request->relance) {
            return back()->withInput()->withErrors(['message' => 'La date de relance doit être supérieure à la date de reception']);
        } else { */
        if ($courrier->save()) {
            $notification = new Notification();
            $notification->libelle = 'Vous avez un nouveau courrier '.$courrier->code;
            $notification->nature = 'courrier';
            $notification->element_id = $courrier->id;
            if ($courrier->direction != null) {
                $notification->direction = $courrier->direction;
            } else {
                $notification->service = $courrier->service;
            }
            $notification->save();

            $log = new Log();
            $log->libelle = 'Enregistrement du courrier public'.$courrier->code;
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Courrier enregistré avec succès!');
            /* } else {
                return back()->withInput()->withErrors(['message' => 'Une erreur est survenue!']);
            } */
        }
    }

    public function store_interne(Request $request)
    {
        $this->validate($request, [
            'fichier' => 'mimes:pdf|max:100000',
        ]);

        //dd($request->input());

        $courrier = new Courrier();
        $courrier->categorie = $request->categorie;
        $courrier->naturecourrier = $request->naturecourrier;
        $courrier->recepteur = Auth::user()->id;
        $courrier->signataire = $request->signataire;
        $courrier->coursier = $request->coursier;
        $courrier->type = $request->type;
        $courrier->ordre = $request->numero;
        $courrier->contenu = $request->contenu;
        $courrier->objet = $request->objet;
        $courrier->destinataire = $request->destinataire;
        $courrier->reception = $request->reception;
        $courrier->relance = $request->relance;
        $courrier->sortie = $request->created_at;
        $courrier->mention = $request->mention;
        $courrier->created_at =Carbon::now();
        $courrier->updated_at =Carbon::now();
        $courrier->nature = 1;
        if ($request->emetteur != null) {
            $destination = explode('-', $request->emetteur);

            if ($destination[1] == 'direction') {
                $courrier->direction = $destination[0];
            } else {
                $courrier->service = $destination[0];
            }
        }

        if ($request->hasfile('fichier')) {
            $file = $request->file('fichier');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('courriers/', $filename);
            $courrier->fichier = 'courriers/'.$filename;
        }

        $courrier->code = str_random(8);

        if ($request->reception = null) {
            return redirect()->back()->withInput()->withErrors(['message' => 'Desolé La date ne doit pas etre vide']);
        } else {
            if ($courrier->save()) {
                $notification = new Notification();
                $notification->libelle = 'Vous avez un nouveau courrier '.$courrier->code;
                $notification->nature = 'courrier';
                $notification->created_at =Carbon::now();
                $notification->updated_at =Carbon::now();
                $notification->element_id = $courrier->id;
                if ($courrier->direction != null) {
                    $notification->direction = $courrier->direction;
                } else {
                    $notification->service = $courrier->service;
                }
                $notification->save();
                $log = new Log();
                $log->libelle = 'Enregistrement du courrier interne'.$courrier->code;
                $log->auteur = Auth::user()->id;
                $log->created_at =Carbon::now();
                $log->updated_at =Carbon::now();
                $log->save();

                return back()->withSuccess('Courrier enregistré avec succès!');
            } else {
                return redirect()->back()->withInput()->withErrors(['message' => 'Une erreur est survenue!']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courrier = Courrier::find($id);

        return view('dashboard.courriers.show', compact('courrier'));
    }

    public function show_interne($id)
    {
        $courrier = Courrier::find($id);

        return view('dashboard.courriers.internes.show', compact('courrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courrier = Courrier::find($id);
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();

        return view('dashboard.courriers.edit', compact('courrier', 'direction', 'sous_direction', 'service'));
    }

    public function edit_interne($id)
    {
        $courrier = Courrier::find($id);
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();

        return view('dashboard.courriers.internes.edit', compact('courrier', 'direction', 'sous_direction', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $courrier = Courrier::find($id);
        $courrier->relance = $request->relance;
        $courrier->reception = $request->reception;
        $courrier->naturecourrier = $request->naturecourrier;
        $courrier->signataire = $request->signataireExt;
        $courrier->coursier = $request->coursier;
        $courrier->ordre = $request->numero;
        $this->validate($request, [
            //'numero' => 'required',
            'fichier' => 'mimes:pdf|max:100000',
        ], [
            'required' => 'Le champ :attribute est obligatoire',
        ]);
        if ($request->fichier != null) {
            if ($request->hasfile('fichier')) {
                $file = $request->file('fichier');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('courriers/', $filename);
                $input['fichier'] = 'courriers/'.$filename;
            }
        }
        if ($request->emetteur != null) {
            $destination = explode('-', $request->emetteur);

            if ($destination[1] == 'direction') {
                $courrier->direction = $destination[0];
            } else {
                $courrier->service = $destination[0];
            }
        }

        if ($courrier->update($input)) {
            $log = new Log();
            $log->libelle = 'Modification du courrier interne '.$courrier->code;
            $log->auteur = Auth::user()->id;
            $log->created_at =Carbon::now();
            $log->save();

            return back()->withSuccess('Courrier modifié avec succès!');
        } else {
            return back()->withInput()->withErrors(['message' => 'Une erreur est survenue, veuillez réesaayé']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function desactivate($id)
    {
        $courrier = Courrier::find($id);
        $courrier['deleted'] == 0 ? $courrier['deleted'] = 1 : $courrier['deleted'] = 0;
        if ($courrier->update()) {
            $courrier_deleted = new CourrierDeleted();
            $courrier_deleted->id_suppresseur = Auth::user()->id;
            $courrier_deleted->id_original = $courrier->id;
            $courrier_deleted->created_at =Carbon::now();
            $courrier_deleted->updated_at =Carbon::now();
            $courrier_deleted->save();
            if ($courrier->deleted == 0) {
                $message = 'Réactivé';
            } else {
                $message = 'Supprimé';
            }
            $log = new Log();
            if ($courrier->deleted == 0) {
                $log->libelle = 'Réactivation du courrier'.$courrier->code;
            } else {
                $log->libelle = 'Suppression du courrier'.$courrier->code;
            }
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Courrier '.$message.' avec succès!');
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function changePdf(Request $request, $id)
    {
        $courrier = Courrier::find($id);
        $this->validate($request, [
            'fichier' => 'required|mimes:pdf|max:100000',
        ]);

        if ($request->hasfile('fichier')) {
            $file = $request->file('fichier');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('courriers/', $filename);
            $courrier['fichier'] = 'courriers/'.$filename;
        }

        if ($courrier->update()) {
            $log->libelle = 'Modification de la pièce jointe du courrier'.$courrier->code;

            return back()->withSuccess('Piéce jointe du document modifié avec succès!');
        } else {
            return redirect()->back()->withInput()->withErrors(['message' => 'Une erreur est survenue, Veuillez réessayer!']);
        }
    }

    public function search_sub($id, Request $request)
    {
        if ($request->categorie == null && $request->type == null && $request->mention == null) {
            return back()->withErrors(['message' => 'Veuillez entrer au moins un élément pour la recherche!']);
        } else {
            if ($request->categorie != null) {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                    where('type', $request->type)->
                    where('mention', $request->mention)->where('direction', Auth::user()->direction)->
                    get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('type', $request->type)->where('direction', $id)->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('categorie', $request->categorie)->
                        where('mention', $request->mention)->where('direction', $id)->
                        get();
                    } else {
                        $courriers = Courrier::where('categorie', $request->categorie)->where('direction', $id)->
                    get();
                    }
                }
            } else {
                if ($request->type != null) {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('type', $request->type)->
                        where('mention', $request->mention)->where('direction', $id)->
                        get();
                    } else {
                        $courriers = Courrier::where('type', $request->type)->
                        where('direction', $id)->
                        get();
                    }
                } else {
                    if ($request->mention != null) {
                        $courriers = Courrier::where('mention', $request->mention)->
                        where('direction', $id)->
                        get();
                    } else {
                        $courriers = [];
                    }
                }
            }
        }

        /*if($request->input('categorie') == null){
            $courriers = [];
        }else{
            $courriers = Courrier::where('categorie', $request->input('categorie'))->get();
        }*/

        return view('dashboard.courriers.result_sub', compact('courriers', 'direction'));
    }
}
