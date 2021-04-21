<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Etudiant;
class Etablissement extends Model
{
    use HasFactory;
     public function etudiants(){
        return $this->belongsToMany(Etudiant::class,'etablissement_etudiants');
    }
}
