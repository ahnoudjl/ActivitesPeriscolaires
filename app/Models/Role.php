<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['titre'];

    // OneToMany (Role <-- Users)
    public function users(){
        return $this->hasMany(User::class);
    }

}
