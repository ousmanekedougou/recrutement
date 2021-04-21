<?php

namespace App\Models\User;

use App\Models\User\Faculty;
use App\Models\User\Commune;
use App\Models\User\Etablissement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

     public function faculties(){
        return $this->belongsToMany(Faculty::class,'faculty_etudiants');
    }

        public function etablissements(){
        return $this->belongsToMany(Etablissement::class,'etablissement_etudiants');
    }

      public function commune(){
        return $this->belongsTo(Commune::class);
    }
}
