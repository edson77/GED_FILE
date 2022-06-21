<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Audience;
use App\InstructionAudience;
use App\User;
use App\Notification;
use App\Log;

class InstructionAudienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id){
        $audience = Audience::find($id);
        return view('dashboard.audiences.add', compact('audience'));
    }

    public function save(Request $request, $id){
        $this->validate($request, [
            'libelle' => 'required',
        ], [
            'required' => 'Veuillez remplir tous les champs car ils sont obligatoires'
        ]);

        $instruction = new InstructionAudience();
        $instruction->libelle = $request->libelle;
        $instruction->audience = $id;
        $instruction->by = Auth::user()->id;

        if($instruction->save()){
            $notification = new Notification();
            $notification->libelle = 'Une instruction vient d\'être ajoutée à une demandé par M/Mme '.Audience::find($instruction->audience)->guest.' en qualité de'.Audience::find($instruction->audience)->quality.'';
            $notification->nature = 'audience';
            $notification->element_id = $id;
            $notification->save();
            $log = new Log();
            $log->libelle = 'Instruction ajoutée à de l\'audience demandé par M/Mme '.Audience::find($instruction->audience)->guest.' en qualité de'.Audience::find($instruction->audience)->quality.'';
            $log->auteur = Auth::user()->id;
            $log->save();
            return back()->withSuccess('Instruction ajoutée à l\'audience');
        }else{
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer!']);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
