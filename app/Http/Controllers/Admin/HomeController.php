<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Departement;
use App\Models\User\Etudiant;
use App\Models\User\Faculty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if (request()->categorie) {
            $etudiants = Etudiant::with('faculties')->whereHas('faculties', function ($query){
                $query->where('slug',request()->filliere);
            })->orderBy('created_at','DESC')->paginate(10);
        }else{
            $etudiants = Etudiant::with('faculties')->orderBy('created_at','DESC')->paginate(10);
        }
        return view('admin/home',compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_etudiant = Etudiant::find($id);
        $departements = Departement::all();
        return view('admin.show',compact('show_etudiant','departements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->option == 1) 
        {
            // dd($request->all());
            $validator = $this->validate($request , [
            'genre' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/',
            'naissance' => 'required|string',
            'lieu' => 'required|string',
            'niveau' => 'required|string',
            'commune' => 'required|numeric',
            'filliere' => 'required|string',
            'etablissement' => 'required|string',
            'status' => 'required|boolean',
            ]);
            $add_etudiant = Etudiant::where('id',$id)->first();
            $add_etudiant->genre = $request->genre;
            $add_etudiant->name = $request->name;
            $add_etudiant->email = $request->email;
            $add_etudiant->phone = $request->phone;
            $add_etudiant->naissance = $request->naissance;
            $add_etudiant->lieu = $request->lieu;
            $add_etudiant->niveau = $request->niveau;
            $add_etudiant->commune_id = $request->commune;
            $add_etudiant->etablissement = $request->etablissement;
            $add_etudiant->status = $request->status;
            $add_etudiant->filliere = $request->filliere;
            $add_etudiant->save();
            return back()->with('success','Votre etudiant ete modifier');
        }
        if ($request->option == 2) {
            $validator = $this->validate($request , [
                'diplome' => 'required|mimes:pdf,PDF',
            ]);                
            $etudiant_diplome = Etudiant::where('id',$id)->first();
            if ($request->hasFile('diplome')) {
                $diplomeName = $request->diplome->store('public/diplomes');
            }
            $etudiant_diplome->diplome = $diplomeName;
            $etudiant_diplome->save();
            return back()->with('success','Le diplome a ete modifier');
        }
        if ($request->option == 3) {
             $validator = $this->validate($request , [
                'curiculum' => 'required|mimes:pdf,PDF',
            ]);    
            $etudiant_curiculum = Etudiant::where('id',$id)->first();
            if ($request->hasFile('curiculum')) {
                $curiculumName = $request->curiculum->store('public/curiculum');
            }
            $etudiant_curiculum->curiculum = $curiculumName;
            $etudiant_curiculum->save();
            return back()->with('success','Le curiculum a ete modifier');
        }
        if ($request->option == 4) {
             $validator = $this->validate($request , [
                'photocopie' => 'required|mimes:pdf,PDF',
            ]);   
            $etudiant_cni = Etudiant::where('id',$id)->first();
            if ($request->hasFile('photocopie')) {
                $cniName = $request->photocopie->store('public/cni');
            }
            $etudiant_cni->identite = $cniName;
            $etudiant_cni->save();
            return back()->with('success','Le identite a ete modifier');
        }
        if ($request->option == 5) {
              $validator = $this->validate($request , [
                'image' => 'required|image | mimes:jpeg,png,jpg,gif,ijf,PNG,JPEG,JPG,GIF,IJF',
            ]);
            $etudiant_image = Etudiant::where('id',$id)->first();
            if ($request->hasFile('image')) {
                $imageName = $request->image->store('public/images');
            }
            $etudiant_image->image = $imageName;
            $etudiant_image->save();
            return back()->with('success','L\'image a ete modifier');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etudiant::find($id)->delete();
        return back()->with('success','Cet etudiant a ete supprimer');
    }
}
