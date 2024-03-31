<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Enfant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnfantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfants = Enfant::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('enfant/index',compact('enfants', 'role'));
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
            return redirect('/enfants')->with('success', 'Vous etes autorisé!');
        }

        $familles = Famille::all();
        return view('enfant/create', compact('familles', 'role'));
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
            return redirect('/enfants')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                    'date_naissance' => 'required',
                    'famille_id' => 'required',
                ]);

        $enfant = new Enfant($validatedData);
        $enfant->save(); 
  
        return redirect('/enfants')->with('success', 'La enfant est enregistré avec succès');
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
        $enfant = Enfant::findOrFail($id);
        return view('enfant/show', compact('enfant', 'role'));
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
            return redirect('/enfants')->with('success', 'Vous etes autorisé!');
        }

       $enfant = Enfant::findOrFail($id);
       $familles = Famille::all();

       return view('enfant/edit', compact('enfant', 'familles', 'role'));
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
            return redirect('/enfants')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                    'date_naissance' => 'required',
                    'famille_id' => 'required',
        ]);
        Enfant::whereId($id)->update($validatedData);
        return redirect('/enfants')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/enfants')->with('success', 'Vous etes autorisé!');
        }
        $enfant = Enfant::findOrFail($id);
        $enfant->delete();
        return redirect('/enfants')->with('success', 'Les données ont été supprimées avec succès');
    }
}
