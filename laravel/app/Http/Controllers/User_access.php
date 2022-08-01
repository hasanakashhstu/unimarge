<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_access_model;
use App\Role;
// use App\Permission;
use App\user;
use Redirect;

class User_access extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:USER_ACCESS'); 
     }
    public function index()
    {
        return view('admin.RBAC.user_access',['user_list'=>user::all(),'role_list'=>Role::all(),'user_access'=>user_access_model::all()]);
        
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
        $check=user_access_model::where('user_id',$request->user_id)->first();

        if($check)
        {
            session()->flash('success_failed', "This User Access are alreday Exist");
            return Redirect::back();
        }
        else
        {
            $user_access=new user_access_model;
            $user_access->fill($request->all())->save();
            session()->flash('success', "User Access are Granted");
            return Redirect::back();
           
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user_access_model::where('user_id',$id)->delete();
        session()->flash('success', "Delete Operation Are Succesfulled");
        return back()->with('success',"Delete Operation Are Succesfulled");

    }
}
