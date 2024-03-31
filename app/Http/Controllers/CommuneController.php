<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::all();
        $user = Auth::user();
        $role = $user->role->titre;
        return view('commune/index',compact('communes', 'role'));
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
        if($role !== 'admin'){
            return redirect('/communes')->with('success', 'Vous etes autorisé!');
        }
        $user = Auth::user();
        $role = $user->role->titre;
        return view('commune/create', compact( 'role'));
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
        if( $role !== 'admin'){
            return redirect('/communes')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
                    'titre' => 'required|max:100',
                ]);

        $show = new Commune($validatedData);
        $show->save(); 
  
        
        return redirect('/communes')->with('success', 'La commune est enregistré avec succès');
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
        $commune =Commune::findOrFail($id);
        return view('commune/show', compact('commune', 'role'));
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
        if($role !== 'admin'){
            return redirect('/communes')->with('success', 'Vous etes autorisé!');
        }
       $commune = Commune::findOrFail($id);

       return view('commune/edit', compact('commune', 'role'));
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
        if($role !== 'admin'){
            return redirect('/communes')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
            'titre' => 'required|max:100'
        ]);
        Commune::whereId($id)->update($validatedData);

        return redirect('/communes')->with('success', 'Les données sont mises à jour avec succès');
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
        if($role !== 'admin'){
            return redirect('/communes')->with('success', 'Vous etes autorisé!');
        }

        $commune = Commune::findOrFail($id);
        $commune->delete();

        return redirect('/communes')->with('success', 'Les données ont été supprimées avec succès');
    }
}
