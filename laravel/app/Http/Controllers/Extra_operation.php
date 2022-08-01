<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permission_role_model;
use Session;

class Extra_operation extends Controller
{
    public function delete_role_current_role(Request $request,$id)
    {

    	foreach ($request->delete_permission as $value) {
    		permission_role_model::where(['role_id'=>$id,'permission_id'=>$value])->delete();
    	}
		Session::flash('success','Succesfully Remove This Permission');
        return back()->with('success','Succesfully Remove This Permission');
    	
    }
}
