<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteCourseCategoryModel;
use App\WebsiteCourseModel;
use Validator;
use Redirect;
use Session;
use File;

class WebsiteCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['course'] = WebsiteCourseModel::all();
        $data['course_category'] = WebsiteCourseCategoryModel::all();
        return view('website.backend.add_course',$data);
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
        $data = new WebsiteCourseModel;
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else{
            $requested_data = $request->all();

            if ($request->hasfile('banner')){
                $file_path = "img/course/";
                $file_name = 'banner'.time() . ".jpg";
                $request->file('banner')->move($file_path, $file_name);
                $requested_data['banner'] = $file_path.$file_name;
            }

            if ($request->hasfile('trainner_image')){
                $file_path = "img/course/";
                $file_name = 'trainner'.time() . ".jpg";
                $request->file('trainner_image')->move($file_path, $file_name);
                $requested_data['trainner_image'] = $file_path.$file_name;
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
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
        $data['course'] = WebsiteCourseModel::findOrFail($id);
        $data['course_category'] = WebsiteCourseCategoryModel::all();
        return view('website.backend.edit_course',$data);
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
        $data = WebsiteCourseModel::findOrFail($id);
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else{
            $requested_data = $request->all();

            if ($request->hasfile('banner')){
                if(File::exists($data->banner)) {
                    File::delete($data->banner);
                }
                $file_path = "img/course/";
                $file_name = 'banner'.time() . ".jpg";
                $request->file('banner')->move($file_path, $file_name);
                $requested_data['banner'] = $file_path.$file_name;
            }

            if ($request->hasfile('trainner_image')){
                if(File::exists($data->trainner_image)) {
                    File::delete($data->trainner_image);
                }
                $file_path = "img/course/";
                $file_name = 'trainner'.time() . ".jpg";
                $request->file('trainner_image')->move($file_path, $file_name);
                $requested_data['trainner_image'] = $file_path.$file_name;
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
            return Redirect::back();
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
        $data = WebsiteCourseModel::findOrFail($id);
        if(File::exists($data->banner)) {
            File::delete($data->banner);
        }
        if(File::exists($data->trainner_image)) {
            File::delete($data->trainner_image);
        }
        $data->delete();
        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }
}
