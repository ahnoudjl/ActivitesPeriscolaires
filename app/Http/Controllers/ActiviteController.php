<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activite::all();
        $user = Auth::user();
        $role = $user->role->titre;
        $association_id = 1;
        if($role === 'gestionnaire'){
            foreach($user->gestionnaires as $gest){
                if($gest->id === $user->id){
                    $association_id = $gest->association_id;
                    break;
                }
            }
        }
            
        return view('activite/index',compact('activites', 'role', 'association_id'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $associations = Association::all();
        return view('activite/create',compact('associations'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'titre' => 'required',
                    'description' => 'required',
                    'prix' => 'required',
                    'capacite' => 'required',
                    'association_id' => 'required',
                ]);

        $activite = new Activite($validatedData);
        $activite->save(); 
  
        return redirect('/activites')->with('success', 'La activite est enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activite = Activite::findOrFail($id);
        $user = Auth::user();
        $role = $user->role->titre;
        return view('activite/show', compact('activite', 'role'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

       $activite = Activite::findOrFail($id);
       $associations = Association::all();

       return view('activite/edit', compact('activite', 'associations'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'titre' => 'required',
                    'description' => 'required',
                    'prix' => 'required',
                    'capacite' => 'required',
                    'association_id' => 'required',
        ]);
        Activite::whereId($id)->update($validatedData);

        return redirect('/activites')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $activite = Activite::findOrFail($id);
        $activite->delete();

        return redirect('/activites')->with('success', 'Les données ont été supprimées avec succès');
    }


    ///////////////// Ajax jQuery 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_store(Request $request)
    {
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'gestionnaire' && $role !== 'admin'){
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'titre' => 'required',
                    'description' => 'required',
                    'prix' => 'required',
                    'capacite' => 'required',
                    'association_id' => 'required',
                ]);

        $activite = new Activite($validatedData);
        $activite->save();
        $activite->association = $activite->association;
        return response()->json($activite);
    }
}
