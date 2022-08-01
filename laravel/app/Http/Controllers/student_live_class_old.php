<?php

namespace App\Http\Controllers;

use App\academic_syllebus_model;
use App\general_settings_model;
use App\LiveClass;
use App\manage_class_model;
use App\manage_subject_model;
use App\ov_setup_model;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Session;

class student_live_class extends Controller
{
  public function index()
  {
    $student = Session::get('student_details');
    $user_auth_check=Session::get('student_or_parents_login');
    if($user_auth_check=='Loggedin')
    {
      $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
      $data['academic_syllabus'] = academic_syllebus_model::all();
      $data['manage_class'] = manage_class_model::all();
      $data['live_classes'] = LiveClass::leftJoin('users','live_class.created_by','users.id')
          ->where('class_name', $student->class)
          ->where('department', $student->department)
          ->where('medium', $student->medium)
          ->where('session', $student->session)
          ->select('live_class.*','users.name')
          ->orderBy('id', 'DESC')
          ->get();
      
      $data['class'] =Session::get('class');
      $data['roll']=Session::get('roll');
      $data['students']=students::where('roll',$data['roll'])->first();
      $data['general_setting']=general_settings_model::first();
      
      return view('student.live_class', $data);
    }
    else
    {
      abort(404);
    }
    
  }
  
  public function openLive($id){
    $user_auth_check=Session::get('student_or_parents_login');
    if($user_auth_check == 'Loggedin'){
      $data['live_class'] = LiveClass::where('id',$id)->first();
      $data['student'] = Session::get('student_details');
      $data['leave_url'] = url('/student_live_class');
      return view('student.open_live', $data);
    }else{
      Session::put('class_url', URL::current());
      return redirect('/student');
    }
  }
  
  public function ZoomSignature ($meeting_number){
    
    $time = time() * 1000; //time in milliseconds (or close enough)
    $api_key = config('zoom.api_key');
    $api_secret = config('zoom.api_secret');
    $role = 0;
    
    $data = base64_encode($api_key . $meeting_number . $time . $role);
    
    $hash = hash_hmac('sha256', $data, $api_secret, true);
    
    $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
    
    //return signature, url safe base64 encoded
    $signature =  rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    
    return response()->json(['status'=>2000, 'signature'=>$signature], 200);
  }
  
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
    //
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
    //
  }
}
