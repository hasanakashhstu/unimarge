<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\create_admin_model;
class ajax_call extends Controller
{
    public function Admin_current_password(Request $request)
    {
    	// print_r($request->current_password);
    	$data=create_admin_model::where('email',$request->email)->first();

    	$bcrypt_password=bcrypt($request->current_password);

   //    	if ($bcrypt_password==$data->password):
			// echo "Password OK";
   //    	else:
   //    		print_r([$bcrypt_password,$data->password]);
   //    		echo "Password False";
   //    	endif;
    

    	if (Hash::check($request->current_password, $data->password))
		{
		   echo "Match";
		}
		else
		{
			echo "Password Not Match";
		}

    }
}
