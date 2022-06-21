<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Audience;
use App\Log;
use Carbon\Carbon;

class AudienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audiences = Audience::orderBy('created_at', 'desc')->limit(100)->get();
        return view('dashboard.audiences.index', compact('audiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.audiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'guest' => 'required',
            'phone' => 'required',
            'quality' => 'required',
            'objet' => 'required'
        ]);

        $audience = new Audience();
        $audience->role = $request->role;
        $audience->guest = $request->guest;
        $audience->phone = $request->phone;
        $audience->quality = $request->quality;
        $audience->objet = $request->objet;
        $audience->created_at = Carbon::now();
        $audience->updated_at = Carbon::now();

        if($audience->save()){
            $log = new Log();
            $log->libelle = 'Enregistrement de l\'audience demandé par M/Mme '.$audience->guest.' en qualité de'.$audience->quality.'';
            $log->auteur = Auth::user()->id;
            $log->created_at= Carbon::now();
            $log->updated_at= Carbon::now();
            $log->save();
            return back()->withSuccess('Audience enregistrée avec succès!');
        }else{
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez réessayer']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $audience = Audience::find($id);
      // dd( $audience);
       if( isset($audience->id)){
            return view('dashboard.audiences.show', compact('audience'));
       }
       return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audience = Audience::find($id);
        return view('dashboard.audiences.edit', compact('audience'));
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
        $audience = Audience::find($id);
        $input = $request->all();
        $this->validate($request, [
            'guest' => 'required',
            'phone' => 'required',
            'quality' => 'required',
            'objet' => 'required'
        ]);

        if($audience->update($input)){
            $log = new Log();
            $log->libelle = 'Modification de l\'audience demandé par M/Mme '.$audience->guest.' en qualité de'.$audience->quality.'';
            $log->auteur = Auth::user()->id;
            $log->updated_at= Carbon::now();
            $log->save();
            return back()->withSuccess('Informations de l\'audience mis à jour avec succès!');
        }else{
            return back()->withErrors(['message' => 'Une erreur est survenue, veuillez recommencer!']);
        }

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
