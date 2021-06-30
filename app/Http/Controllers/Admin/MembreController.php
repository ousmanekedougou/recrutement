<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MembreController extends Controller
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
       if (Auth::user()->isAdmin == 1) {
            $admins = User::all();
            return view('admin.admin.index',compact('admins'));
       }
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
        if (Auth::user()->isAdmin == 1) {
            $this->validate($request,[
                'name' => 'required|string',
                'email' => 'required|unique:users',
                'phone' => 'required|unique:users|numeric',
                'password' => 'required|min:6|string',
            ]);
            $admin = new User();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->status = $request->status;
            $admin->isAdmin = $request->admin;
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect(route('membre.index'))->with('success','Votre admin a ete ajoute');
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
        if (Auth::user()->isAdmin == 1) {
            $admins = User::find($id);
            return view('admin.admin.edit',compact('admins'));
        }
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
        if (Auth::user()->isAdmin == 1) {
            $request->status? : $request['status'] = 0 ;
            $user = User::where('id',$id)->update($request->except('_token','_method'));
            return redirect()->route('membre.index')->with('success','La modification a ete enregistre');
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
        if (Auth::user()->isAdmin == 1) {
            User::where('id',$id)->delete();
            return back()->with('success','Ce membre a ete supprime');
        }
    }
}
