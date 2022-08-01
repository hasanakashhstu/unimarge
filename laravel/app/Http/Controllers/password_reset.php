<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class password_reset extends Controller
{
    
    public function password_forget(Request $request)
    {
            echo $request->reset_email;

          $data = array('name'=>"Hasan ALi");
   		 
	      Mail::send('emails.view', $data, function ($message)
	      {
		    $message->from('hasanali689009@gmail.com', 'Laravel');
			$message->to('rahibhasan689009@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
		 });
	      echo "Basic Email Sent. Check your inbox.";
    }
}
