<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Commune;
class Departement extends Model
{
    use HasFactory;

        public function communes(){
        return $this->hasMany(Commune::class);
    }
}
