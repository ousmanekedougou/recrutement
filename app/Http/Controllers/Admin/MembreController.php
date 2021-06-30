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
                'password' => 'required|min:6|string|confirmed',
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
        $admin = User::where('id',$id)->first();
        return view('admin.profile.index',compact('admin'));
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
            $admin = User::where('id',$id)->first();
            if ($request->status == null) {
                $admin->status = 0;
            }else {
                $admin->status = $request->status;
            }
            if ($request->admin == null) {
                $admin->isAdmin = 0;
            }else {
                $admin->isAdmin = $request->admin;
            }
            $admin->save();
            return redirect()->route('membre.index')->with('success','La modification a ete enregistre');
        }else {
            return redirect()->route('admin.home');
        }
    }

    public function update_info(Request $request , $id){
            $this->validate($request,[
                'name' => 'required|string',
                'email' => 'required',
                'phone' => 'required|numeric',
            ]);
            $admin_update = User::where('id',$id)->first();
            $admin_update->name = $request->name;
            $admin_update->email = $request->email;
            $admin_update->phone = $request->phone;
            $admin_update->save();
            return back()->with('success','Votre profil a ete mise a jour');

    }

    public function update_password(Request $request , $id){
          $this->validate($request,[
                'password' => 'required|min:6|string|confirmed',
            ]);
            $update_password = User::where('id',$id)->first;
            $update_password->password = Hash::make($request->password);
            $update_password->save();
            return back()->with('success','Votre mot de passe a ete mise a jour');
    }

    public function update_image(Request $request , $id){
          $admin_updat_image = User::where('id',$id)->first();
        $imageName = '';
        if($request->image == Null){
            $imageName = $admin_updat_image->image;
        }else{

            if($request->hasFile('image')){
                $imageName = $request->image->store('public/Admin');
            }
        }
        $admin_updat_image->image = $imageName;
        $admin_updat_image->save();
        return back()->with('success','Votre image de profile a bien ete modifier');
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
