<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\canteen_component_model;
use Session;
use Validator;
class canteen_component_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
       $this->middleware('permission:CANTEEN');
     }
    public function index()
    {
        $canteen_component=canteen_component_model::all();
        return view('admin.Canteen.canteen_component',['canteen_component'=>$canteen_component]);
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
        $canteen_component=new canteen_component_model;
        $valid=Validator::make($request->all(),$canteen_component->rules());
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }
        else
        {
            $old_component=canteen_component_model::where('component_title',$request->component_title)->first();

            if($old_component)
            {
               
                Session::flash('error','Component Already Added');
                return back();
                
            }
            else
            {
                 $requested_data=$request->all();
                $requested_data=array_add($requested_data,'canteen_component_id',time());
                $canteen_component->fill($requested_data)->save();

                Session::flash('success','New Component Added Succssfully');
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
        $canteen_component_data=canteen_component_model::findOrFail($id);
        return view('admin.Canteen.canteen_component_edit',['canteen_component_data'=>$canteen_component_data]);
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
        $canteen_component=canteen_component_model::where('canteen_component_id',$id)->first();

        $canteen_component->fill($request->all())->save();

        Session::flash('success','Component Updateed Succssfully');
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
        $canteen_component=canteen_component_model::findOrFail($id);
        $canteen_component->delete();

         Session::flash('success','Component Deleted Succssfully');
         return back();

    }
}
