<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Absence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absences = Absence::all();
        $user = Auth::user();
        $role = $user->role->titre;
        if( $role !== 'admin'){
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
        return view('absence/index',compact('absences', 'role'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
        $users = User::all();
        $associations = Association::all();
        return view('absence/create',compact('users', 'associations', 'role'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $validatedData = $request->validate([
                    'user_id' => 'required|unique:absences',
                    'association_id' => 'required',
                ]);

        $absence = new Absence($validatedData);
        $absence->save(); 
  
        return redirect('/absences')->with('success', 'La absence est enregistré avec succès');
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
        $absence =Absence::findOrFail($id);
        return view('absence/show', compact('absence', 'role'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
       $absence = Absence::findOrFail($id);
       $users = User::all();
       $associations = Association::all();

       return view('absence/edit', compact('absence', 'users', 'associations', 'role'));
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
            'user_id' => 'required|unique:absences',
            'association_id' => 'required',
        ]);
        Absence::whereId($id)->update($validatedData);

        return redirect('/absences')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }

        $absence = Absence::findOrFail($id);
        $absence->delete();

        return redirect('/absences')->with('success', 'Les données ont été supprimées avec succès');
    }
}
