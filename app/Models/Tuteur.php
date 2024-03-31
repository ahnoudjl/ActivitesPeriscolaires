<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuteur extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'association_id'];

    // ManyToOne (Tuteurs --> User)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // ManyToOne (Tuteurs --> Association)
    public function association(){
        return $this->belongsTo(Association::class);
    }


}
