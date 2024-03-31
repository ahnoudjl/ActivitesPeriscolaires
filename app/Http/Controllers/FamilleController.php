<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('famille/index',compact('familles', 'role'));
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
            return redirect('/familles')->with('success', 'Vous etes autorisé!');
        }
        $associations = Association::all();
        return view('famille/create',compact('associations', 'role'));
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
            return redirect('/familles')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'tel_fixe' => 'required',
                    'tel_portable' => 'required',
                    'tel_travail' => 'required',
                    'remarques' => 'required',
                    'n_caf' => 'required',
                    'association_id' => 'required',
                ]);

        $famille = new Famille($validatedData);
        $famille->save(); 
  
        return redirect('/familles')->with('success', 'La famille est enregistré avec succès');
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
        $famille = Famille::findOrFail($id);
        return view('famille/show', compact('famille', 'role'));
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
            return redirect('/familles')->with('success', 'Vous etes autorisé!');
        }
       $famille = Famille::findOrFail($id);
       $associations = Association::all();

       return view('famille/edit', compact('famille', 'associations', 'role'));
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
            return redirect('/familles')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
                    'tel_fixe' => 'required',
                    'tel_portable' => 'required',
                    'tel_travail' => 'required',
                    'remarques' => 'required',
                    'n_caf' => 'required',
                    'association_id' => 'required',
        ]);
        Famille::whereId($id)->update($validatedData);

        return redirect('/familles')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/familles')->with('success', 'Vous etes autorisé!');
        }
        $famille = Famille::findOrFail($id);
        $famille->delete();

        return redirect('/familles')->with('success', 'Les données ont été supprimées avec succès');
    }
}
