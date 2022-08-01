<?php

namespace App\Http\Controllers;

use App\User;
use App\Teacher;
use App\unions_model;
use App\ov_setup_model;
use App\upazilas_model;
use App\districts_model;
use App\divisions_model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\manage_faculty_model;
use App\manage_subject_model;
use App\teacher_address_child;
use Illuminate\Validation\Rule;
use App\manage_department_model;
use App\Services\StorageService;
use App\Http\Controllers\Controller;
use App\teacher_qualification_child;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class teacher_info extends Controller
{
    use StorageService;


    public function index()
    {
        abort_unless(Auth::user()->can('create teacher'), 403);

        $divisions_data = divisions_model::get();
        $districts_data = districts_model::get();
        $upazilas_data = upazilas_model::get();
        $unions_data = unions_model::get();

        return view('admin.Teacher_Staff.teacher_info', ['job_type_data' => ov_setup_model::where('type', 'Job Type')->get(), 'work_department_data' => ov_setup_model::where('type', 'Work Department')->get(), 'medium' => ov_setup_model::where('type', 'Medium')->get(), 'faculty' => manage_faculty_model::get(), 'department' => manage_department_model::groupby('department_name')->get(), 'subject' => manage_subject_model::groupby('subject_name')->get(), 'divisions_data' => $divisions_data, 'districts_data' => $districts_data, 'upazilas_data' => $upazilas_data, 'unions_data' => $unions_data]);
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
        abort_unless(Auth::user()->can('create teacher'), 403);

        $request->validate([
            'teacher_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $teacher = new Teacher();
        $prev_emp = $teacher->where('employment_id', $request->employment_id)->first();
        $validation = Validator::make($request->all(), $teacher->validation());
        $status = Str::lower($request->status);

        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else if (!empty($prev_emp)) {
            Session::flash('error', 'Employment Id Already Exists');
            return back()->withInput();
        } else if ($status !== 'teacher' && $status !== 'staff') {
            Session::flash('error', 'Status should be teacher or staff!');
            return back()->withInput();
        } else {
            $data = $request->all();

            // create new user
            $user = new User();
            $user->name = $request->teacher_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            // assign a role
            $user->assignRole($status);

            $data['user_id'] = $user->id;

            //Teacher photo Upload if exist
            $request->hasfile('photo') && $data['photo'] = $this->uploadFile($request->file('photo'), 'teacher_staff');

            //File Save Code
            $teacher->fill($data)->save();
            //File Save Code

            $data['parent'] = $teacher->teacher_id;

            //Teacher Address Child Add
            $teacher_address_child = new teacher_address_child;
            $teacher_address_child->fill($data)->save();

            //Teacher Address Child Add

            //Teacher Qualification Child Add

            $teacher_qualification_child = new teacher_qualification_child;
            $teacher_qualification_child->fill($data)->save();

            //Teacher Qualification Child Add

            Session::flash('success', "($request->teacher_name) Information Add Succesfully");
            return back();
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
        abort_unless(Auth::user()->can('edit teacher'), 403);

        return view('admin.Teacher_Staff.teacher_info_edit', ['teacher' => Teacher::where('teacher_id', $id)->first(), 'teacher_address_child' => teacher_address_child::where('parent', $id)->first(), 'teacher_qualification_child' => teacher_qualification_child::where('parent', $id)->first(), 'job_type_data' => ov_setup_model::where('type', 'Job Type')->get(), 'work_department_data' => ov_setup_model::where('type', 'Work Department')->get(), 'medium' => ov_setup_model::where('type', 'Medium')->get(), 'department' => manage_department_model::groupby('department_name')->get(), 'subject' => manage_subject_model::groupby('subject_name')->get(), 'faculty' => manage_faculty_model::get()]);
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
        abort_unless(Auth::user()->can('edit teacher'), 403);

        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'teacher_name' => 'required|string',
            'email' => 'required|email|' . Rule::unique('teachers', 'email')->ignore($teacher->teacher_id, 'teacher_id'),
        ]);

        $validation = Validator::make($request->all(), $teacher->validation_edit());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {

            $data = $request->all();

            //Teacher photo Upload if exist
            $request->hasfile('photo') && $data['photo'] = $this->uploadFile($request->file('photo'), 'teacher_staff', $teacher->photo);

            $teacher->fill($data)->save();
            teacher_address_child::where('parent', $id)->first()->fill($data)->save();
            teacher_qualification_child::where('parent', $id)->first()->fill($data)->save();

            session()->flash('success', "($request->teacher_name) Update Operation Are  Succesfully Completed");
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     * $FCI_NEWS_FILE_NAME=FCI_NEWS_NOTICE::where('sk',$request->SK)->first();
     * $FILE_PATH_WITH_NAME_with_cover="image/admin/NEWS_NOTICE/$FCI_NEWS_FILE_NAME->cover_file";
     * File::delete($FILE_PATH_WITH_NAME_with_cover);
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Auth::user()->can('delete teacher'), 403);

        $teacher = Teacher::findOrFail($id);

        // delete user data
        User::find($teacher->user_id)->delete();

        $teacher->photo && Storage::delete($teacher->photo);
        $teacher->delete();
        teacher_address_child::where('parent', $id)->delete();
        teacher_qualification_child::where('parent', $id)->delete();

        session()->flash('success', "Delete Operation Succesfully Completed");
        return back()->with('success', "Delete Operation Succesfully Completed");
    }

    public function type_wise_subject(Request $request)
    {
        $department_data = manage_department_model::groupBy('department_name')->get();
        $subject_data = manage_subject_model::groupBy('subject_name')->get();
        echo "<option value=''>--Select--</option>";

        if ($request->type_data == 'Tech') {
            foreach ($department_data as $department_data_fetch) {
                echo "<option>$department_data_fetch->department_name</option>";
            }
        } else {
            foreach ($subject_data as $subject_data_fetch) {
                echo "<option>$subject_data_fetch->subject_name</option>";
            }
        }
    }
}
