<?php

namespace App\Http\Controllers;

use App\Models\ChefFamille;
use App\Models\Famille;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefFamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chef_familles = ChefFamille::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('chef_famille/index',compact('chef_familles', 'role'));
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
            return redirect('/chef_familles')->with('success', 'Vous etes autorisé!');
        }

        $familles =Famille::all();
        $users =User::all();
        return view('chef_famille/create',compact('familles', 'users', 'role'));
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
            return redirect('/chef_familles')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'famille_id' => 'required|unique:chef_familles',
                    'user_id' => 'required|unique:chef_familles',
                ]);

        $chef_famille = new ChefFamille($validatedData);
        $chef_famille->save(); 
  
        return redirect('/chef_familles')->with('success', 'La chef_famille est enregistré avec succès');
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
        $chef_famille = ChefFamille::findOrFail($id);
        return view('chef_famille/show', compact('chef_famille', 'role'));
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
            return redirect('/chef_familles')->with('success', 'Vous etes autorisé!');
        }

       $chef_famille = ChefFamille::findOrFail($id);
       $familles =Famille::all();
       $users =User::all();
       return view('chef_famille/edit', compact('chef_famille', 'familles', 'users'));
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
            return redirect('/chef_familles')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
            'famille_id' => 'required|unique:chef_familles',
            'user_id' => 'required|unique:chef_familles',
        ]);
        ChefFamille::whereId($id)->update($validatedData);

        return redirect('/chef_familles')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/chef_familles')->with('success', 'Vous etes autorisé!');
        }
        
        $chef_famille = ChefFamille::findOrFail($id);
        $chef_famille->delete();

        return redirect('/chef_familles')->with('success', 'Les données ont été supprimées avec succès');
    }
}
