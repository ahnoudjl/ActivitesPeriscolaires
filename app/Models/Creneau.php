<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creneau extends Model
{
    use HasFactory;
    protected $fillable = ['jour',
                           'debut_periode',
                           'fin_periode',
                         'activite_id'];

    // ManyToOne (Creanaux --> Activite)
    public function activite(){
        return $this->belongsTo(Activite::class);
    }
}
