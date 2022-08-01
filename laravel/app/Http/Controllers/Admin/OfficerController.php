<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['officers'] = Officer::latest()->get();
        return view('admin.officer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::latest()->get();

        return view('admin.officer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $officer = new Officer();

        $this->validate($request, $officer->validationRules());

        $data = $request->all();
        // store news data
        $officer->fill($data)->save();

        return redirect('admin/officers')->with('success', 'Officer Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        $data['departments'] = manage_department_model::latest()->get();
        $data['officer'] = $officer;

        return view('admin.officer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $this->validate($request, $officer->validationRules());

        $data = $request->all();
        // store news data
        $officer->fill($data)->save();

        return redirect('admin/officers')->with('success', 'Officer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect()->back()->with('success', 'Officer Deleted Successfully!');
    }
}
