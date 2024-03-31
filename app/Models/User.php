<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'adresse',
        'tele',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ManyToOne (Users --> role)
    public function role(){
        return $this->belongsTo(Role::class);
    }

    // OneToMany (Association <-- Tuteurs)
    public function tuteurs(){
        return $this->hasMany(Tuteur::class);
    }

    // OneToMany (Association <-- Gestionnaires)
    public function gestionnaires(){
        return $this->hasMany(Gestionnaire::class);
    }

    // OneToMany (Association <-- Parents)
    public function parents(){
        return $this->hasMany(ChefFamille::class);
    }
}
