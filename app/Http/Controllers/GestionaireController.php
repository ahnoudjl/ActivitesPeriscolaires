<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Gestionnaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestionnaires = Gestionnaire::all();
        $user = Auth::user();
        $role = $user->role->titre;
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }
        return view('gestionnaire/index',compact('gestionnaires', 'role'));
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
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }
        $users = User::all();
        $associations = Association::all();
        return view('gestionnaire/create',compact('users', 'associations', 'role'));
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

        if($role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'user_id' => 'required|unique:gestionnaires',
                    'association_id' => 'required',
                ]);

        $gestionnaire = new Gestionnaire($validatedData);
        $gestionnaire->save(); 
  
        return redirect('/gestionnaires')->with('success', 'La gestionnaire est enregistré avec succès');
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
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }
        $gestionnaire =Gestionnaire::findOrFail($id);
        return view('gestionnaire/show', compact('gestionnaire', 'role'));
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
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }
       $gestionnaire = Gestionnaire::findOrFail($id);
       $users = User::all();
       $associations = Association::all();

       return view('gestionnaire/edit', compact('gestionnaire', 'users', 'associations', 'role'));
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
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
            'user_id' => 'required|unique:gestionnaires',
            'association_id' => 'required',
        ]);
        Gestionnaire::whereId($id)->update($validatedData);

        return redirect('/gestionnaires')->with('success', 'Les données sont mises à jour avec succès');
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
        if( $role !== 'admin'){
            return redirect('/activtes')->with('success', 'Vous etes autorisé!');
        }

        $gestionnaire = Gestionnaire::findOrFail($id);
        $gestionnaire->delete();

        return redirect('/gestionnaires')->with('success', 'Les données ont été supprimées avec succès');
    }
}
