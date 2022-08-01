<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\assign_canteen_model;
use Session;
use Validator;
class assign_canteen_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('permission:CANTEEN');
     }
    public function index()
    {
        $assign_canteen_data=assign_canteen_model::all();
        return view('admin.Canteen.assign_canteen',['assign_canteen_data'=>$assign_canteen_data]);
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
        $assign_canteen=new assign_canteen_model;
        $valid=Validator::make($request->all(),$assign_canteen->rules());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $old=assign_canteen_model::where('student_roll',$request->student_roll)->first();

            if($old)
            {
               
                Session::flash('error','Student Already Assigned');
                return back();
                
            }
            else
            {
                $requested_data=$request->all();
                $requested_data=array_add($requested_data,'assign_canteen_id',time());
                $assign_canteen->fill($requested_data)->save();

                Session::flash('success','New Student Assign Succssfully');
               return back();
            }
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
        $canteen_data=assign_canteen_model::where('assign_canteen_id',$id)->first();
        return view('admin.Canteen.assign_canteen_edit',['canteen_data'=>$canteen_data]);
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
        $assign_canteen=assign_canteen_model::where('assign_canteen_id',$id)->first();

        $assign_canteen->fill($request->all())->save();
        Session::flash('success','Date Updated Succssfully');
       return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assign_canteen_delete=assign_canteen_model::findOrFail($id);
        $assign_canteen_delete->delete();
        Session::flash('success','Student Deleted Succssfully');
       return back();

    }
}
