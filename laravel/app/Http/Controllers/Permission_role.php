<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\permission_role_model;
use Session;
use DB;
use Redirect;
class Permission_role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:PERMISSION ROLE'); 
     }
    public function index()
    {   
        $role=permission_role_model::groupby('role_id')->get();
        return view('admin.RBAC.permission_role',['all_permission'=>Permission::all(),'role'=>Role::all(),'create_permission_role'=>$role]); 
       
        
       
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

if(!permission_role_model::where('role_id',$request->role_id)->first())
{

        $fill_data=array_fill_keys($request->content_permission,$request->role_id);
       

        foreach ($fill_data as $key => $value) {
            $role=new permission_role_model;
            $role->permission_id=$key;
            $role->role_id=$value;
            $role->save();
        }
        Session::flash('success','This Role Are Successfully Set Permission');
        return Redirect::back();
}
else
{
    Session::flash('error',"Duplicate Entry Are Not Allowed");
    return Redirect::back();

}
        // extract($request->all());
        // $colspan=array_merge($content_permission,$module_permission);
        //  print_r($colspan);
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
        
        $permission=permission_role_model::where('role_id',$id)->get();
        $permission_id_pass=[];
        foreach ($permission as $value) {
           
            $permission_id_pass[]=$value;
        }
        $permission_role_based=[];

        foreach ($permission_id_pass as $permission_value) {
          $permission_role_based[]=Permission::where('id',$permission_value->permission_id)->first();
        }


        
        return view('admin.RBAC.role_configuration',['current_role'=>$permission_role_based,"permission"=>Permission::all(),'admin_info'=>Role::where('id',$id)->first()]);
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
        if($request->permission_id):
        $fill_data=array_fill_keys($request->permission_id,$id);

        foreach ($fill_data as $key => $value) {
            
            $a=permission_role_model::where(['permission_id'=>$key,'role_id'=>$value])->first();
            
            if($a)
            {
                Session::flash('success_failed','This Permission are Already Exist');
                
            }
            else
            {
               $role=new permission_role_model;
                $role->permission_id=$key;
                $role->role_id=$value;
                $role->save(); 
            }
            
        }
        Session::flash('success','This Role Are Successfully Set Permission');
        return Redirect::back();
        else:
        Session::flash('error','Please Set Permission First');
        return Redirect::back();
        endif;
        
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        permission_role_model::where('role_id',$id)->delete();
        Session::flash('success','Successfully Delete This Permission');
        return Redirect::back();
    }

    
}
