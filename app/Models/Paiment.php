<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    use HasFactory;
    protected $fillable = ['famille_id', 'activite_id'];
   
    // ManyToOne
    public function famille(){
        return $this->belongsTo(Famille::class);
    }


     // ManyToOne
    public function activite(){
        return $this->belongsTo(Activite::class);
    }
}
