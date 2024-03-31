<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associations = Association::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('association/index',compact('associations', 'role'));
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
            return redirect('/associations')->with('success', 'Vous etes autorisé!');
        }

        $communes = Commune::all();
        return view('association/create',compact('communes', 'role'));
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
            return redirect('/associations')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'titre' => 'required|max:100',
                ]);

        $association = new Association($validatedData);
        $association->commune_id = $request->commune_id;
        $association->save(); 
  
        
        return redirect('/associations')->with('success', 'La association est enregistré avec succès');
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
        $association =Association::findOrFail($id);
        return view('association/show', compact('association', 'role'));
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
            return redirect('/associations')->with('success', 'Vous etes autorisé!');
        }

       $association = Association::findOrFail($id);
       $communes = Commune::all();
       
       return view('association/edit', compact('association', 'communes', 'role'));
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
            return redirect('/associations')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
            'titre' => 'required|max:100'
        ]);
        Association::whereId($id)->update($validatedData);
        Association::whereId($id)->update(array('commune_id' => $request->commune_id));

        return redirect('/associations')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/associations')->with('success', 'Vous etes autorisé!');
        }

        $association = Association::findOrFail($id);
        $association->delete();

        return redirect('/associations')->with('success', 'Les données ont été supprimées avec succès');
    }
}
