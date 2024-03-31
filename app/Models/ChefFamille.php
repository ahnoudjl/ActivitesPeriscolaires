<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefFamille extends Model
{
    use HasFactory;
    protected $fillable = [ 'famille_id', 'user_id'];

    // ManyToOne (Parents --> Famille)
    public function Famille(){
        return $this->belongsTo(Famille::class);
    }

    // ManyToOne (Parents --> User)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
