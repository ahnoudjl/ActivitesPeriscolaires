<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $user = Auth::user();
        $role = $user->role->titre;
        if($role !== 'admin'){
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        return view('role/index',compact('roles', 'role'));
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
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        return view('role/create', compact( 'role'));
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
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
                    'titre' => 'required|max:100',
                ]);

        $show = new Role($validatedData);
        $show->save(); 
  
        
        return redirect('/roles')->with('success', 'La role est enregistré avec succès');
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
        $user_role = $user->role->titre;
        if($user_role !== 'admin'){
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        $role =Role::findOrFail($id);
        return view('role/show', compact('role', 'user_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $role = Role::findOrFail($id);
       $user = Auth::user();
        $user_role = $user->role->titre;
        if($user_role !== 'admin'){
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
       return view('role/edit', compact('role', 'user_role'));
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
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        $validatedData = $request->validate([
            'titre' => 'required|max:100'
        ]);
        Role::whereId($id)->update($validatedData);

        return redirect('/roles')->with('success', 'Les données sont mises à jour avec succès');
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
            return redirect('/roles')->with('success', 'Vous etes autorisé!');
        }
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/roles')->with('success', 'Les données ont été supprimées avec succès');
    }
}
