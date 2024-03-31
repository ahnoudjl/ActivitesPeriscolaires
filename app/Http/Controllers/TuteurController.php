<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Tuteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteurs = Tuteur::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('tuteur/index',compact('tuteurs', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =User::all();
        $user = Auth::user();
        $role = $user->role->titre;
        $associations = Association::all();
        return view('tuteur/create',compact('users', 'associations', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                    'user_id' => 'required|unique:tuteurs',
                    'association_id' => 'required',
                ]);

        $tuteur = new Tuteur($validatedData);
        $tuteur->save(); 
  
        return redirect('/tuteurs')->with('success', 'La tuteur est enregistré avec succès');
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
        $tuteur =Tuteur::findOrFail($id);
        return view('tuteur/show', compact('tuteur', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tuteur = Tuteur::findOrFail($id);
       $users =User::all();
       $associations = Association::all();
        $user = Auth::user();
        $role = $user->role->titre;
       return view('tuteur/edit', compact('tuteur', 'users', 'associations',  'role'));
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
        $validatedData = $request->validate([
            'user_id' => 'required|unique:tuteurs',
            'association_id' => 'required',
        ]);
        Tuteur::whereId($id)->update($validatedData);

        return redirect('/tuteurs')->with('success', 'Les données sont mises à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tuteur = Tuteur::findOrFail($id);
        $tuteur->delete();

        return redirect('/tuteurs')->with('success', 'Les données ont été supprimées avec succès');
    }
}
