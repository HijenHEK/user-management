<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        $this->middleware('can:manage-users');
    }


     public function index()
    {
        return view('admin.users.index' , [
            'users' => User::all()
        ]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit' , [
            'roles' => Role::all() ,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd('before : ' . $user->roles->pluck('name'));

        
        $request->validate([
            'name' => 'min:4|required|string',
            'email' => 'email|required|unique:users,email,'.$user->id,
            'roles' => 'required|exists:roles,id'
        ]);

         

        $user->update($request->all());
        $user->roles()->detach($user->roles);
        $user->roles()->sync(Request('roles'));

        return back()->with('update-success' , $user->name . 'updated successfully ! ');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        if (Gate::denies('delete-users')) {
            return back()->with('403' , 'you are not allowed to edit users ! please contact your admin');
        }  
        $user->delete();
        return back()->with('message' , 'user '.$user->name.' was deleted successfully !');
    }
}
