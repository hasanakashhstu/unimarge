<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteCourseRegModel;
use App\WebsiteCourseModel;
use Validator;
use Redirect;
use Session;
use File;

class WebsiteCourseRegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = WebsiteCourseRegModel::leftJoin('website_course','website_course.website_course_id','=','website_course_registration.id')
                        ->select('website_course_registration.*','website_course.title')->orderBy('website_course_registration.created_at','DESC')->get();
        return view('website.backend.course_student_list',$data);
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
        $data = new WebsiteCourseRegModel;
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else{
            $requested_data = $request->all();

            if ($request->hasfile('image')){
                $file_path = "img/course/";
                $file_name ='student'.time() . ".jpg";
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path.$file_name;
            }

            $data->fill($requested_data)->save();

            $course = WebsiteCourseModel::findOrFail($request->course_id);
            
            if ($course->available_seat > 0) {
                $course->update(['available_seat' => $course->available_seat - 1]);
            }

            Session::flash('success', "Registration Successfully");
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
