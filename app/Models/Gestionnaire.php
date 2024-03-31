<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'association_id'];

    // ManyToOne (Gestionnaires --> Association)
    public function association(){
        return $this->belongsTo(Association::class);

    }

    // ManyToOne (Gestionnaires --> User)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
