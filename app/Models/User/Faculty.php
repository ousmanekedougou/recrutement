<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Etudiant;
class Faculty extends Model
{
    use HasFactory;
    public function etudiants(){
        return $this->belongsToMany(Etudiant::class,'faculty_etudiants');
    }
}
