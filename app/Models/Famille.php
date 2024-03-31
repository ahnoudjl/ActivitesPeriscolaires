<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $fillable = ['tel_fixe',
                           'tel_portable',
                           'tel_travail',
                           'remarques',
                           'n_caf',
                        'association_id'];

    // ManyToOne (Familles --> Association)
    public function association(){
        return $this->belongsTo(Association::class);
    }

    // OneToMany (Famille <-- Enfants)
    public function enfants(){
        return $this->hasMany(Enfant::class);
    }

    // OneToMany (Famille <-- Parents)
    public function parents(){
        return $this->hasMany(ChefFamille::class);
    }

    // ManyToMany
    /**
     * Famille <-- Paiments.
     */
    public function paiments()
    {
        return $this->belongsToMany(Activite::class)->using(Paiment::class);
    }
}
