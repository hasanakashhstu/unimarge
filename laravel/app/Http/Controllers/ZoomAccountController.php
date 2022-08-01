<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use MacsiDigital;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class ZoomAccountController extends Controller
{
    public function store(Request $request){
        $zoom = new MacsiDigital\Zoom\Zoom();
        // $meetings = $zoom->meeting->list('fcY4lQCPTXerWsEHO5jtJA');
        $user = new MacsiDigital\Zoom\Classes\User;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->type = 1;
    
        $meetingCreate = $zoom->user->create($user);
        
        if ($meetingCreate['code'] == 201){
            $app_user = User::where('id', auth()->user()->id)->first();
            $app_user->zoom_user_id = $meetingCreate['id'];
            $app_user->save();
            return redirect('live_class');
        }else{
            if ($meetingCreate['code'] == 1005){
                return redirect('live_class')->with('Error', $meetingCreate['message']);
            }
            return redirect('live_class')->with('Error', "Registration Failed");
        }
        
    }
}
