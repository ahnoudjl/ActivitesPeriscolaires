<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = ['date_inscription'];
    
    // ManyToOne
    public function tuteur(){
        return $this->belongsTo(Tuteur::class);
    }

    // ManyToOne
    public function enfant(){
        return $this->belongsTo(Enfant::class);
    }

     // ManyToOne
    public function activite(){
        return $this->belongsTo(Activite::class);
    }
}
