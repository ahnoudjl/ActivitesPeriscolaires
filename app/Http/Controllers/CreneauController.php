<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Creneau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreneauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creneaus = Creneau::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('creneau/index',compact('creneaus', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/creneaus')->with('success', 'Vous etes autorisé!');
        }

        $activites = Activite::all();
        return view('creneau/create',compact('activites', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/creneaus')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                        'jour'=> 'required',
                           'debut_periode'=> 'required',
                           'fin_periode'=> 'required',
                         'activite_id'=> 'required'
                ]);

        $creneau = new Creneau($validatedData);
        $creneau->save(); 
  
        return redirect('/creneaus')->with('success', 'La creneau est enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $role = $user->role->titre;
        $creneau = Creneau::findOrFail($id);
        return view('creneau/show', compact('creneau', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/creneaus')->with('success', 'Vous etes autorisé!');
        }

       $creneau = Creneau::findOrFail($id);
       $activites = Activite::all();

       return view('creneau/edit', compact('creneau', 'activites', 'role'));
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
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/creneaus')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'jour'=> 'required',
                           'debut_periode'=> 'required',
                           'fin_periode'=> 'required',
                         'activite_id'=> 'required'
        ]);
        Creneau::whereId($id)->update($validatedData);

        return redirect('/creneaus')->with('success', 'Les données sont mises à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/creneaus')->with('success', 'Vous etes autorisé!');
        }

        $creneau = Creneau::findOrFail($id);
        $creneau->delete();

        return redirect('/creneaus')->with('success', 'Les données ont été supprimées avec succès');
    }
}
