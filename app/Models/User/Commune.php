<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Etudiant;
use App\Models\User\Departement;

class Commune extends Model
{
    use HasFactory;

       public function departement(){
        return $this->belongsTo(Departement::class);
    }


     public function etudiants(){
        return $this->hasMany(Etudiant::class);
    }
}
