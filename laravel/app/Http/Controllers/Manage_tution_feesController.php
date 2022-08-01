<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_department_model;
use App\ov_setup_model;
use App\manage_faculty_model;
use App\Manage_tution_fees_model;
use App\general_settings_model;
use Session;
use Validator;

class Manage_tution_feesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:MANAGE_DEPARTMENT');
    }

    public function index()
    {
        $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
        $data['faculty'] = manage_faculty_model::get();
        $data['department'] = manage_department_model::all();
        $data['tution_fees'] = Manage_tution_fees_model::join('manage_department', 'manage_tution_fees.department_name', '=', 'manage_department.id')->get();
        $data['session'] = ov_setup_model::where('type', 'Session')->get();
        $data['batch'] = general_settings_model::first();

        return view('admin.class.manage_tution_fee', $data);
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
        $manage_tution_fees = new Manage_tution_fees_model;

        $validation = Validator::make($request->all(), $manage_tution_fees->validation_rule());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $manage_tution_fees->fill($request->all())->save();
            Session::flash('success', "New Tution Fee Information Are Succesfully Inserted");
            return back()->withInput();
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
        $data['manageTutionFees'] = Manage_tution_fees_model::findOrFail($id);
        $data['medium'] = ov_setup_model::where('type', 'Medium')->get();
        $data['faculty'] = manage_faculty_model::get();
        $data['department'] = manage_department_model::all();
        $data['session'] = ov_setup_model::where('type', 'Session')->get();
        $data['batch'] = general_settings_model::first();

        return view('admin.class.Edit.manage_tution_fee_edit', $data);
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
        $manage_tution_fees = Manage_tution_fees_model::findOrFail($id);

        $validation = Validator::make($request->all(), $manage_tution_fees->validation_rule());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $manage_tution_fees->fill($request->all())->save();
            Session::flash('success', "Tution Fee Information Updated.");
            return redirect('manage_tution_fees')->withInput();
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
        Manage_tution_fees_model::findOrFail($id)->delete();

        return back()->with('success', 'Deleted Succesfully.');
    }
}
