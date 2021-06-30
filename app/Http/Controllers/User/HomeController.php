<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Commune;
use App\Models\User\Departement;
use App\Models\User\Etablissement;
use App\Models\User\Faculty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fillieres = Faculty::all();
        $etablissements = Etablissement::all();
        $departements = Departement::all();
        return view('user.index',compact('fillieres','etablissements','departements'));
    }
}
