<?php

namespace App\Http\Controllers;

use App\academic_syllebus_model;
use App\ClassFile;
use App\LiveClass;
use App\manage_class_model;
use App\manage_department_model;
use App\ov_setup_model;
use App\students;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use MacsiDigital;
use DB;

class LiveClassController extends Controller
{
  public function __construct()
  {
    //  $this->middleware('permission:ACADEMIC_SYLLABUS');
  }
  
  public function index()
  {
    /*if (auth()->user()->zoom_user_id) {
      $zoom = new MacsiDigital\Zoom\Zoom();
      $meetingCreate = $zoom->user->retrieve(auth()->user()->zoom_user_id);
      
      $url = $meetingCreate->personal_meeting_url;
      
      if (!empty($url)) {
        $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
        $data['academic_syllabus'] = academic_syllebus_model::all();
        $data['manage_class'] = manage_class_model::all();
        $data['live_classes'] = LiveClass::where('created_by', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $data['sessions'] = ov_setup_model::where('type', 'Session')->get();
        return view('admin.live_class.list', $data);
      } else {
        $data['zoom_error'] = 'Please Check Your email and Verify your Zoom Account';
        return view('admin.live_class.list', $data);
      }
    }*/
    
    $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
    $data['academic_syllabus'] = academic_syllebus_model::all();
    $data['manage_class'] = manage_class_model::all();
    if(Auth::user()->can('live_class')) {
        $data['live_classes'] = LiveClass::orderBy('id', 'DESC')->get();
    } else {
        $data['live_classes'] = LiveClass::where('teacher_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
    }
    $data['teachers'] = DB::table('users')->where('status', 'Active')->orderBy('name', 'asc')->get();
    $data['teacher_data'] = collect($data['teachers'])->keyBy('id')->all();
    $data['sessions'] = ov_setup_model::where('type', 'Session')->get();
    return view('admin.live_class.list', $data);
  }
  
  public function create()
  {
    //
  }
  
  public function store(Request $request)
  {
    $this->validate($request, [
        "topic" => "required",
        "start_time" => "required",
        "end_time" => "required",
        "class_name" => "required",
        "teacher_id" => "required",
        "department" => "required",
        "medium" => "required",
        "session" => "required",
    ]);
    $data = $request->all();
    
    $start_date = date('Y-m-d', strtotime($data['start_date']));
    $start_time = date('H:i:s', strtotime($data['start_time']));
    $data['start_time'] = $start_date . ' ' . $start_time;
    $end_date = date('Y-m-d', strtotime($data['end_date']));
    $end_time = date('H:i:s', strtotime($data['end_time']));
    $data['end_time'] = $end_date . ' ' . $end_time;
    
    $datetime1 = new DateTime($start_time);
    $datetime2 = new DateTime($end_time);
    $interval = $datetime1->diff($datetime2);
    $hour_to_min = ($interval->h * 60);
    $min = ($interval->i);
    $duration = $hour_to_min + $min;
    
    $zoom = new MacsiDigital\Zoom\Zoom();
    
    $meeting = new MacsiDigital\Zoom\Classes\Meeting;
    $meeting->topic = isset($data['topic']) ? $data['topic'] : 'Default Topic';
    $meeting->start_time = $start_date . 'T' . $start_time . 'z';
    $meeting->duration = $duration;
    $meeting->timezone = "Asia/Dhaka";
    $meeting->type = 2;
    
    // $meetingCreate = $zoom->meeting->create(auth()->user()->zoom_user_id, $meeting);
    $meetingCreate = $zoom->meeting->create(config('zoom.zoom_user_id'), $meeting);
    
    $live_class = new LiveClass();
    $live_class->fill($data);
    $live_class->created_by = auth()->user()->id;
    $live_class->meeting_id = $meetingCreate['id'];
    $live_class->start_url = $meetingCreate['start_url'];
    $live_class->save();
    
    
    $input = $request->all();
    $file_name = $request->input('file_name');
    
    if ($live_class && isset($input['files']) && count($input['files']) > 0) {
      foreach ($input['files'] as $key => $file) {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images/class_files', $imageName);
        
        $class_file = new ClassFile();
        $class_file->class_id = $live_class->id;
        $class_file->file_name = $file_name[$key];
        $class_file->file_path = 'images/class_files/' . $imageName;
        $class_file->save();
      }
    }
    
    //Teacher Mail
    $subject = 'online class on '. $live_class->topic;
    $teacher = DB::table('users')->find($live_class->teacher_id);
    $teacher_name = @$teacher->name;
    $teacherMail = @$teacher->email;
    if(filter_var($teacherMail, FILTER_VALIDATE_EMAIL)) {
        Mail::send('admin.live_class.email', ['class' => $live_class, 'teacher_name'=>$teacher_name, 'is_teacher'=>true], function ($message) use ($subject, $teacher) {
          $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
          $message->to($teacher->email, $teacher->name);
          $message->subject($subject);
        });
    }
    
    //Student Mail
    $subject = 'online class on '. $live_class->topic;
    $students = students::where('class', $live_class->class_name)
        ->where('department', $live_class->department)
        ->where('medium', $live_class->medium)
        ->where('session', $live_class->session)
        ->pluck('email');
    
    $mails = [];
    foreach ($students as $student){
      if(filter_var($student, FILTER_VALIDATE_EMAIL)) {
        $mails[] = $student;
      }
    }
    
    if(count($mails) > 0){
        Mail::send('admin.live_class.email', ['class' => $live_class, 'teacher_name'=>$teacher_name], function ($message) use ($subject, $mails) {
          $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
          $message->to($mails);
          $message->subject($subject);
        });
    }
    
    
    return back()->with('success', "Live Class Inserted");
  }
  
  
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }
  
  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
    $data['academic_syllabus'] = academic_syllebus_model::all();
    $data['manage_class'] = manage_class_model::all();
    $data['teachers'] = DB::table('users')->where('status', 'Active')->orderBy('name', 'asc')->get();
    $departments = manage_department_model::all();
    $data['departments'] = $departments->unique('department_code');
    $data['live_class'] = LiveClass::where('id', $id)->first();
    $data['sessions'] = ov_setup_model::where('type', 'Session')->get();
    
    return view("admin.live_class.edit", $data);
  }
  
  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
        "topic" => "required",
        "start_time" => "required",
        "end_time" => "required",
        "class_name" => "required",
        "teacher_id" => "required",
        "department" => "required",
      // "subject" => "required",
        "medium" => "required",
        "session" => "required",
    ]);
    $data = $request->all();
    $start_date = date('Y-m-d', strtotime($data['start_date']));
    $start_time = date('H:i:s', strtotime($data['start_time']));
    $data['start_time'] = $start_date . ' ' . $start_time;
    $end_date = date('Y-m-d', strtotime($data['end_date']));
    $end_time = date('H:i:s', strtotime($data['end_time']));
    $data['end_time'] = $end_date . ' ' . $end_time;
    $live_class = LiveClass::where('id', $id)->first();
    $live_class->fill($data);
    $live_class->save();
    
    return back()->with('success', "Live Class Updated");
  }
  public function UpdateFiles(Request $request)
  {
    $input = $request->all();
    $file_name = $request->input('file_name');
    
    if (isset($input['files']) && count($input['files']) > 0) {
      foreach ($input['files'] as $key => $file) {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        // $file->move(public_path('images/class_files'), $imageName);
        $file->move('images/class_files', $imageName);
        
        $class_file = new ClassFile();
        $class_file->class_id = $input['class_id'];
        $class_file->file_name = $file_name[$key];
        $class_file->file_path = 'images/class_files/' . $imageName;
        $class_file->save();
      }
    }
    
    return back()->with('success', "Live Class Inserted");
  }
  public function DeleteFiles($id)
  {
    ClassFile::where('id', $id)->delete();
    return back()->with('success', "File Successfully Deleted");
    
  }
  public function delete($id)
  {
    LiveClass::where('id', $id)->delete();
    return response()->json('success', 200);
    
  }
  
  public function StartClass(Request $request)
  {
    $live_class = LiveClass::where('id', $request->id)->first();
    if ($live_class) {
      $start_time = strtotime($live_class->start_time);
      $end_time = strtotime($live_class->end_time);
      $current_time = strtotime(date('Y-m-d H:i:s'));
      $minuit = round(abs($start_time - $current_time) / 60, 2);
      
      if ($minuit <= 10 || $current_time < $end_time) {
        $live_class->status = 1;
        $live_class->save();
        
        return response()->json(['status' => 2000], 200);
      } else {
        if ($minuit > 10 && $current_time < $start_time) {
          return response()->json(['status' => 3000, 'message' => 'Try the class before maximum 10 minuit'], 200);
        } else {
          return response()->json(['status' => 3000, 'message' => 'Try at Exact Class Time'], 200);
        }
      }
    }
  }
  public function Files(Request $request)
  {
    $files = ClassFile::where('class_id', $request->id)->get();
    return response()->json(['status'=>2000, 'data'=>$files], 200);
  }
  
  public function StartSDKClass($id){
    $data['student'] = Auth::user();
    $data['role'] = 1;
    $data['live_class'] = LiveClass::where('id', $id)->first();
    $data['leave_url'] = url('/live_class');
    return view('student.open_live', $data);
  }
}
