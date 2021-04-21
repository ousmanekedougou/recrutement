<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
      public function store(Request $request)
    {
        $validator = $this->validate($request , [
            'genre' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:etudiants',
            'phone' => 'required|unique:etudiants|numeric',
            'date' => 'required|string',
            'lieu' => 'required|string',
            'niveau' => 'required|string',
            'commune' => 'required|numeric',
            'cni' => 'required|mimes:PDF,pdf',
            'curiculum' => 'required|mimes:pdf,PDF',
            'image' => 'required|dimensions:min_width=50,min_height=100|image | mimes:jpeg,png,jpg,gif,ijf',
            'diplome' => 'required|mimes:pdf,PDF',
        ]);
        // dd($request->all());
        $add_etudiant = new Etudiant;
        $cniName = '';
        $imageName = '';
        $diplomeName = '';
        $curiculumName = '';
        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        }
        if ($request->hasFile('curiculum')) {
            $curiculumName = $request->curiculum->store('public/curiculums');
        }
        if ($request->hasFile('cni')) {
            $cniName = $request->cni->store('public/cni');
        }
        if ($request->hasFile('diplome')) {
            $diplomeName = $request->diplome->store('public/diplomes');
        }
        $add_etudiant->genre = $request->genre;
        $add_etudiant->name = $request->name;
        $add_etudiant->email = $request->email;
        $add_etudiant->phone = $request->phone;
        $add_etudiant->naissance = $request->date;
        $add_etudiant->lieu = $request->lieu;
        $add_etudiant->niveau = $request->niveau;
        $add_etudiant->image = $imageName;
        $add_etudiant->curiculum = $curiculumName;
        $add_etudiant->identite = $cniName;
        $add_etudiant->diplome = $diplomeName;
        $add_etudiant->commune_id = $request->commune;
        $add_etudiant->save();
        $add_etudiant->faculties()->sync($request->filliere);
        $add_etudiant->etablissements()->sync($request->etablissement);
        return back();
     
    }
}
