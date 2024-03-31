<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['titre', 'prix', 'description', 'capacite', 'association_id'];

    // OneToMany (Activite <-- Creneaus)
    public function creneaus(){
        return $this->hasMany(Creneau::class);
    }

    // ManyToOne (Associations --> Activite)
    public function association(){
        return $this->belongsTo(Association::class);
    }


    // ManyToMany
    /**
     * Activite <-- Inscriptions.
     */
    public function enfants()
    {
        return $this->belongsToMany(Enfant::class)->using(Inscription::class);
    }

    // ManyToMany
    /**
     * Activite <-- Absences.
     */
    public function enfants2()
    {
        return $this->belongsToMany(Enfant::class)->using(Absence::class);
    }

    // ManyToMany
    /**
     * Activite <-- Paiments.
     */
    public function paiments()
    {
        return $this->belongsToMany(Famille::class)->using(Paiment::class);
    }
}
