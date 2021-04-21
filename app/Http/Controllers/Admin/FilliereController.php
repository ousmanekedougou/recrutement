<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class FilliereController extends Controller
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
        $fillieres = Faculty::paginate(10);
        return view('admin.filliere.index',compact('fillieres'));
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

        $add_filliere = new Faculty();
        $add_filliere->name = $request->name;
        $add_filliere->slug = $request->slug;
        $add_filliere->status = $request->status;
        $add_filliere->save();
        Session::flash('success' , 'La filliere a bien ete ajouter');
        return redirect()->route('filliere.index')->with('success','La filliere a bien ete ajouter');
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
        $update_filliere = Faculty::where('id',$id)->first();
        $update_filliere->name = $request->name;
        $update_filliere->slug = $request->slug;
        $update_filliere->status = $request->status;
        $update_filliere->save();
        Session::flash('success' , 'La filliere a bien ete mise a jour');
        return redirect()->route('filliere.index')->with('success','La filliere a bien ete mise a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::find($id)->delete();
        Session::flash('success' , 'La filliere a bien ete supprimer');
        return redirect()->route('filliere.index')->with('success','La filliere a bien ete supprimer');

    }
}
