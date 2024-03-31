<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['titre'];

    // OneToMany (Commune <-- Associations)
    public function associations(){
        return $this->hasMany(Association::class);
    }
}
