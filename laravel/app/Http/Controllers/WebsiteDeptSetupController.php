<?php

namespace App\Http\Controllers;

use App\manage_department_model;
use Illuminate\Http\Request;
use App\WebsiteEventsModel;
use App\WebsiteSetupModel;
use App\Dept_SetupModel;
use Validator;
use Redirect;
use Session;
use File;


class WebsiteDeptSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['message'] = Dept_SetupModel::join('manage_department', 'department_setup.department', '=', 'manage_department.id')->get();
        $data['departments'] = manage_department_model::all();
        return view('website.backend.dept_setup', $data);
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

        $data = new Dept_SetupModel;
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            $requested_data = $request->all();


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
        $data['departmentPageSetup'] = Dept_SetupModel::findOrFail($id);
        $data['departments'] = manage_department_model::all();

        return view('website.backend.dept_setup_edit', $data);
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
        $departmentSetup = Dept_SetupModel::findOrFail($id);
        $validate = Validator::make($request->all(), $departmentSetup->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        } else {
            $requested_data = $request->all();

            $departmentSetup->fill($requested_data)->save();

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
        Dept_SetupModel::findOrFail($id)->delete();

        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }
}
