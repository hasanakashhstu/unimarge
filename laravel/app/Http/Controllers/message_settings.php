<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use  App\message_settings_model;
use Redirect;

class message_settings extends Controller
{


     public function __construct()
     {
       $this->middleware('permission:MESSAGES'); 
     }
     
    public function index()
    {
    	return view('admin.Message.message',['sms_info'=> message_settings_model::where('id','1')->first()]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $username=$request->username;
         $password=$request->Password;
         $mask=$request->mask;
         $option=$request->option;
         $all_value=array($username,$password,$mask,$option);
         $name=array("username","password","mask","option");
         $info_data=array_combine($name,$all_value);
         $json_convert=json_encode($info_data);
        
         message_settings_model::where('id','1')->where('name','ORSMS')->update(['info'=>$json_convert]);
         Session::flash('success'," '$request->article_name' Information Are Successfully Updated");
         return back()->with('success'," $request->article_name Information Are Successfully Updated");

    }

    /**each
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
}
