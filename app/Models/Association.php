<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $fillable = ['titre'];

    // ManyToOne (Associations --> Commune)
    public function commune(){
        return $this->belongsTo(Commune::class);
    }

    // OneToMany (Association <-- Familles)
    public function familles(){
        return $this->hasMany(Famille::class);
    }

    // OneToMany (Association <-- Gestinnares)
    public function gestionnaires(){
        return $this->hasMany(Gestionnaire::class);
    }

    // OneToMany (Association <-- Activites)
    public function activites(){
        return $this->hasMany(Activite::class);
    }
}
