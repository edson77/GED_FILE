<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Courrier;
use App\Instruction;
use App\Direction;
use App\Service;
use App\Log;
use App\Notification;
use Illuminate\Support\Collection;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recu()
    {
        if (Auth::user()->direction != '0') {
            $instructions = Instruction::where('direction', Auth::user()->direction)->get();
        } elseif (Auth::user()->service != '0') {
            $instructions = Instruction::where('service', Auth::user()->service)->get();
        } elseif(Auth::user()->direction == '2') {
            $instructions = Instruction::where('direction', '2')->get();
        }

        return view('dashboard.instructions.recu', compact('instructions'));
         
       /*$instructions1 = Instruction::orderBy('created_at', 'asc')->get();
        $instructions2 =[];
        
        foreach($instructions1 as $instruction){
            if($instruction->direction == Auth::user()->direction){
                $instructions2[] = $instruction;
            }
            if($instruction->service ==  Auth::user()->service){
                $instructions2[] =$instruction;
            }
        }
        $instructions =collect($instructions2);//transformer un tableau en collection
       // dd($instructions);

        return view('dashboard.instructions.recu', compact('instructions'));*/
    }

    public function index()
    {
        $instructions = Instruction::orderBy('created_at', 'asc')->limit(100)->get();

        return view('dashboard.instructions.index', compact('instructions'));
    }

    public function delete($id)
    {
        $instruction = Instruction::find($id);
        if ($instruction->delete()) {
            $log = new Log();
            $log->libelle = 'Suppression d\'une instruction donnée sur le courrier'.Courrier::find($instruction->courrier)->code;
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Instruction supprimée avec succès!');
        } else {
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    public function instructions_courrier()
    {
        if (Direction::find(Auth::user()->direction)->code_direction == 'DAG') {
            $instructions = Instruction::where('service', 7)->get();
        } elseif (Service::find(Auth::user()->service)->code_service == 'SCDA') {
            $instructions = Instruction::where('service', 7)->get();
        } else {
            if (Auth::user()->direction != '0') {
                $instructions = Instruction::where('direction', Auth::user()->direction)->get();
            } elseif (Auth::user()->service != '0') {
                $instructions = Instruction::where('service', Auth::user()->service)->get();
            }
        }

        return view('dashboard.instructions.courrier', compact('instructions'));
    }

    public function add($id)
    {
        $direction = Direction::whereNull('parent')->get();
        $sous_direction = Direction::whereNotNull('parent')->get();
        $service = Service::all();
        $courrier = Courrier::find($id);

        return view('dashboard.instructions.add', compact('courrier', 'direction', 'sous_direction', 'service'));
    }

    public function save($id, Request $request)
    {
        $this->validate($request, [
            //'destinataire' => 'required',
            // 'instruction' => 'required',
        ]);

        $instruction = new Instruction();
        $instruction->by = Auth::user()->id;
        $instruction->instruction = $request->instruction;
        $instruction->courrier = $id;
        if ($request->destinataire != null) {
            $destination = explode('-', $request->destinataire);
            if ($destination[1] == 'direction') {
                $instruction->direction = $destination[0];
            } else {
                $instruction->service = $destination[0];
            }
        }

        if ($instruction->save()) {
            $notification = new Notification();
            $notification->libelle = 'Une instruction vient d\'être ajoutée au courrier'.Courrier::find($instruction->courrier)->code;
            $notification->nature = 'courrier';
            $notification->element_id = $id;
            if ($instruction->direction != '0') {
                $notification->direction = $instruction->direction;
            } else {
                $notification->service = $instruction->service;
            }
            $notification->save();
            $log = new Log();
            $log->libelle = 'Instruction ajoutée sur le courrier '.Courrier::find($instruction->courrier)->code;
            $log->auteur = Auth::user()->id;
            $log->save();

            return back()->withSuccess('Instruction enregistrée avec succès!');
        } else {
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
}
