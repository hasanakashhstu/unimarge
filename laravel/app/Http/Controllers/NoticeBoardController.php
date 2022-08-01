<?php

namespace App\Http\Controllers;

use App\class_notice_child_model;
use App\Http\Controllers\Controller;
use App\manage_class_model;
use App\manage_department_model;
use App\message_settings_model;
use App\notice_board_model;
use App\parents_info_model;
use App\parent_notice_child_model;
use App\Services\StorageService;
use App\sms_value;
use App\students;
use App\stuent_notice_child_model;
use App\teacher_model;
use App\teacher_notice_child_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;
use Validator;

class NoticeBoardController extends Controller
{
    use StorageService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:NOTICEBOARD');
    }
    public function index()
    {
        $data["notice_board_data"] = notice_board_model::orderBy('notice_id', 'desc')->get();
        $data["manage_department"] = manage_department_model::all();
        $data['student_notice'] = notice_board_model::where('to', 'student')->get();
        $data['teacher_notice'] = notice_board_model::where('to', 'Teacher')->get();
        $data['class_notice'] = notice_board_model::where('to', 'Class')->get();
        $data['parents_notice'] = notice_board_model::where('to', 'Parents')->get();
        $data['teacher_data'] = teacher_model::all();
        $data['class_data'] = manage_class_model::all();
        $data['parents_data'] = parents_info_model::all();

        return view('admin.notice_board.notice_board', $data);
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

        $model_obj = new notice_board_model;
        $validation = Validator::make($request->all(), $model_obj->validation());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $Data = $request->all();
            $notice_board_model_obj = new notice_board_model;
            $message_settings = message_settings_model::first();
            $sms_data = json_decode($message_settings->info);

            $notice_board_model_obj->fill($Data)->save();

            if ($request->hasFile('file')) {
                $notice_board_model_obj->file = $this->uploadFile($request->file('file'), 'noticeboard');
                $notice_board_model_obj->save();
            }


            if ($request->to == "Student") :
                if ($request->sw_student_roll) :

                    $stuent_notice_child_model_obj = new stuent_notice_child_model();

                    $student_roll = $request->sw_student_roll;
                    $student_info = students::where('roll', $student_roll)->first();
                    $parent_id = $student_info->parent_name;
                    $parent_data = parents_info_model::where('parent_id', $parent_id)->first();
                    $parent_mobile = $parent_data->phone;
                    $count = count($parent_mobile);

                    if ($sms_data->option == 'active') :
                        $smsobj = new sms_value;
                        $smsobj->sms($count, $parent_mobile, $request);
                    endif;
                    $stuent_notice_child_model_obj->fill($Data)->save();
                endif;
            elseif ($request->to == "Teacher") :
                if ($request->tw_teacher_name == "ALL") :
                    $stuent_notice_child_model_obj = new teacher_notice_child_model();
                    $stuent_notice_child_model_obj->fill($Data)->save();
                endif;
            elseif ($request->to == "Class") :
                $stuent_notice_child_model_obj = new class_notice_child_model();

                $student_parent_info = students::select('parent_name')->where('class', $request->cw_class)->get();
                $parent_mobile = null;
                $count = 0;
                foreach ($student_parent_info as $student_parent_list) {
                    if ($student_parent_list->parent_name) {
                        $parent_mobile_data = parents_info_model::where('parent_id', $student_parent_list->parent_name)->first();
                        $parent_mobile_no = $parent_mobile_data->phone;
                        $parent_mobile = $parent_mobile . ($parent_mobile ? "," : "") . "$parent_mobile_no";
                    }
                    $count++;
                }
                if ($sms_data->option == 'active') :
                    $smsobj = new sms_value;
                    $smsobj->sms($count, $parent_mobile, $request);
                endif;

                $stuent_notice_child_model_obj->fill($Data)->save();

            elseif ($request->to == "Parents") :
                $stuent_notice_child_model_obj = new parent_notice_child_model();
                $stuent_notice_child_model_obj->fill($Data)->save();

            endif;

            Session::flash('success', "Successfully Added A New Notice");
            return Redirect::back();
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
        $data['noticeBoard'] = notice_board_model::findOrFail($id);
        $data["manage_department"] = manage_department_model::all();

        return view('admin.notice_board.notice_board_edit', $data);
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
        $noticeBoard = notice_board_model::findOrFail($id);
        $validation = Validator::make($request->all(), $noticeBoard->validation(true));
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $data = $request->all();
            // upload file and delete old file
            $request->hasFile('file') && $data['file'] = $this->uploadFile($request->file('file'), 'noticeboard', $noticeBoard->file);

            $noticeBoard->update($data);

            return redirect('notice_board')->with('success', 'Successfully Updated Notice');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = notice_board_model::findOrFail($id);
        $notice->file && Storage::delete($notice->file);
        $notice->delete();

        parent_notice_child_model::where('notice_id', $id)->delete();
        stuent_notice_child_model::where('notice_id', $id)->delete();
        teacher_notice_child_model::where('notice_id', $id)->delete();
        class_notice_child_model::where('notice_id', $id)->delete();

        Session::flash('success', 'Notice Deleted Successfully');
        return Redirect::back();
    }
}
