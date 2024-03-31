<?php

use App\Http\Controllers\AbsenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\ChefFamilleController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CreneauController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\GestionaireController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PaimentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TuteurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('users', [CustomAuthController::class, 'all'])->name('users.all')->middleware('auth');
Route::get('users/{id}/edit', [CustomAuthController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::get('users/{id}', [CustomAuthController::class, 'show'])->name('users.show')->middleware('auth');
Route::put('users/{id}', [CustomAuthController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('users/{id}', [CustomAuthController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


/****************** */
Route::resource('activites', ActiviteController::class)->middleware('auth');;
// Route::get('communes', [CommuneController::class, 'index']);
Route::resource('communes', CommuneController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('associations', AssociationController::class)->middleware('auth');
Route::resource('tuteurs', TuteurController::class)->middleware('auth');
Route::resource('gestionnaires', GestionaireController::class)->middleware('auth');
Route::resource('chef_familles', ChefFamilleController::class)->middleware('auth');
Route::resource('familles', FamilleController::class)->middleware('auth');
Route::resource('enfants', EnfantController::class)->middleware('auth');
Route::resource('creneaus', CreneauController::class)->middleware('auth');
Route::resource('inscriptions', InscriptionController::class)->middleware('auth');
Route::resource('absences', AbsenceController::class)->middleware('auth');
Route::resource('paiments', PaimentController::class)->middleware('auth');

/***** AJax jQuery */
Route::post('activites/ajax_store', [ActiviteController::class, 'ajax_store'])->name('activites.ajax_store')->middleware('auth');



