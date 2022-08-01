<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\salary_component_model;
use Session;
use Validator;
use Redirect;
class salary_component extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
       $this->middleware('permission:SLARY_COMPONENTS'); 
     }
    public function index()
    {
        return view('admin.payroll.salary_component',['salary_component_info'=>salary_component_model::all()]);
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
        
         $salary_component_info=new salary_component_model;
         $check_abbr=$salary_component_info->where('abbr',$request->abbr)->first();
            if($check_abbr){
                Session::flash('error','Already Have This Abbr Please Try Different');
                return back()->withInput();  
            }
            else
            {
                 $validation=Validator::make($request->all(),$salary_component_info->rules_role());
                if($validation->fails())
                {
                     return back()->withInput()->withErrors($validation);
                }
                else
                {
                   
                         $salary_component_data=$request->all();
                        $salary_component_data=array_add($salary_component_data,'salary_component_id',time());
                         $salary_component_info->fill($salary_component_data)->save();
            
                }

                 Session::flash('success','New Salary Component');
                return back()->with('success','New Salary Component');
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
          return view('admin.payroll.Edit.salary_component_edit',['salary_component_info'=>salary_component_model::where('salary_component_id',$id)->first()]);
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
        if(salary_component_model::where('abbr',$request->abbr)->first())
        {
             Session::flash('error','Sorry ! We Dont Udated . CHange Abbr');
            return back()->withInput();

        }
        else
        {
            salary_component_model::where('salary_component_id',$id)->first()->fill($request->all())->save();  
            Session::flash('success','Salary Component Updated');
            return back()->with('success','Salary Component Updated');
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
        salary_component_model::where('salary_component_id',$id)->delete();
          Session::flash('success', "Salary Component is Succesfully Deleted");
        return back()->with('success','Salary Component is Succesfully Deleted');
    }
}
