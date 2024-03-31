<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $fillable = ['nom',
                           'prenom',
                           'date_naissance',
                         'famille_id'];

    // ManyToOne (Enfants --> Famille)
    public function famille(){
        return $this->belongsTo(Famille::class);
    }


    // ManyToMany
    /**
     * Enfant <-- Inscriptions.
     */
    public function activites()
    {
        return $this->belongsToMany(Activite::class)->using(Inscription::class);
    }


    // ManyToMany
    /**
     * Enfant <-- Absences.
     */
    public function activites2()
    {
        return $this->belongsToMany(Activite::class)->using(Absence::class);
    }
}
