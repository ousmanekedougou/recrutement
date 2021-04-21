<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class EtablissementController extends Controller
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
         $etablissements = Etablissement::paginate(10);
        return view('admin.etablissement.index',compact('etablissements'));
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
         $this->validate($request,[
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|numeric',
        ]);

        $add_etablissement = new Etablissement();
        $add_etablissement->name = $request->name;
        $add_etablissement->slug = $request->slug;
        $add_etablissement->status = $request->status;
        $add_etablissement->save();
        Session::flash('success' , 'L\' etablissement a bien ete ajouter');
        return redirect()->route('etablissement.index')->with('success','L\' etablissement a bien ete ajouter');
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
        $this->validate($request,[
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'required|numeric',
        ]);
        // dd($request->all());
        $update_etablissement = Etablissement::where('id',$id)->first();
        $update_etablissement->name = $request->name;
        $update_etablissement->slug = $request->slug;
        $update_etablissement->status = $request->status;
        $update_etablissement->save();
        Session::flash('success' , 'L\' etablissement a bien ete mise a jour');
        return redirect()->route('etablissement.index')->with('success','L\' etablissement a bien ete mise a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etablissement::find($id)->delete();
        Session::flash('success' , 'La etablissement a bien ete supprimer');
        return redirect()->route('etablissement.index')->with('success','La etablissement a bien ete supprimer');
    }
}
