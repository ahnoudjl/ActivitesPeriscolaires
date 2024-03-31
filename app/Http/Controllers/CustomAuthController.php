<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// source : https://www.positronx.io/laravel-custom-authentication-login-and-registration-tutorial/
class CustomAuthController extends Controller
{
    public function all()
    {
        $users = User::all();
        $user = Auth::user();
        $role = $user->role->titre;
        if( $role !== 'admin'){
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
        return view('auth.index', compact('users', 'role'));
    }

    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'prenom' => $data['prenom'],
        'adresse' => $data['adresse'],
        'tele' => $data['tele'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('layout');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
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
        $user =User::findOrFail($id);
        return view('auth/show', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::findOrFail($id);
       $user = Auth::user();
        $role = $user->role->titre;
        if( $role !== 'admin'){
            return redirect('/activites')->with('success', 'Vous etes autorisé!');
        }
       return view('auth/edit', compact('user', 'role'));
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
            'name' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'tele' => 'required',
            'password' => 'required|min:6',
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'Les données sont mises à jour avec succès');
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

        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/users')->with('success', 'Les données ont été supprimées avec succès');
    }
}