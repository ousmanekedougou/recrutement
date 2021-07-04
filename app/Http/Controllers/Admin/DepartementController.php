<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User\Departement;
use App\Models\User\Commune;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $departement = Departement::all();
        $commune = Commune::all();
        return view('admin.localite.index',compact('departement','commune'));
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
        if ($request->option == 1) {
            $this->validate($request,[
                    'name' => 'required|string'
            ]);
            Departement::create($request->all());
            return back()->with('success','Votre departement a ete ajoute');
        }elseif ($request->option == 2) {
             $this->validate($request,[
                    'name' => 'required|string',
                    'departement' => 'required|numeric'
            ]);
            $add_commune = new Commune();
            $add_commune->name = $request->name;
            $add_commune->departement_id = $request->departement;
            $add_commune->save();
            return back()->with('success','Votre commune a ete ajoute');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
           if ($request->option == 1) {
            $this->validate($request,[
                'name' => 'required|string'
            ]);
            $update_dep = Departement::where('id',$id)->first();
            $update_dep->name =  $request->name;
            $update_dep->save();
            return back()->with('success','Votre departement a ete ajoute');
        }elseif ($request->option == 2) {
             $this->validate($request,[
                    'name' => 'required|string',
                    'departement' => 'required|numeric'
            ]);
            $update_commune = Commune::where('id',$id)->first();
            $update_commune->name = $request->name;
            $update_commune->departement_id = $request->departement;
            $update_commune->save();
            return back()->with('success','Votre commune a ete ajoute');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        if ($request->option == 1) {
            Departement::where('id',$id)->delete();
            return back()->with('success','Votre departement a ete supprimer');
        }elseif ($request->option == 2) {
            Commune::where('id',$id)->delete();
            return back()->with('success','Votre commune a ete supprimer');
        }
    }
}
