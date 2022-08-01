<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteFacultiesModel;
use App\teacher_model;
use App\manage_department_model;
use Validator;
use Redirect;
use Session;
use File;

class WebsiteFacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculties'] = WebsiteFacultiesModel::join('teacher','teacher.teacher_id','=','website_faculties.department_head')->select('website_faculties.*','teacher.teacher_name')->get();
        $data['teacher'] = teacher_model::get();
        $department = manage_department_model::all()->toArray();
        $data['department'] = collect($department)->unique('department_code');

    
        return view('website.backend.add_faculties',$data);
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
        $data = new WebsiteFacultiesModel;
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        else{
            $data->fill($request->all())->save();
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
        $data['faculties'] = WebsiteFacultiesModel::findOrFail($id);
        $data['teacher'] = teacher_model::get();
        $department = manage_department_model::all()->toArray();
        $data['department'] = collect($department)->unique('department_code');

    
        return view('website.backend.edit_faculties',$data);
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
        $data = WebsiteFacultiesModel::findOrFail($id);
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        else{

            $data->fill($request->all())->save();
            Session::flash('success', "Updated Successfully");
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
        $data = WebsiteFacultiesModel::findOrFail($id);
        $data->delete();
        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }
}
