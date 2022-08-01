<?php

namespace App\Http\Controllers\Admin;

use App\DepartmentContent;
use App\Http\Controllers\Controller;
use App\manage_department_model;
use Illuminate\Http\Request;

class DepartmentContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['type'] = $request->query('type');
        $data['typeName'] = str_replace('_', ' ', $data['type']);
        $data['departmentContents'] = DepartmentContent::where('type', $data['type'])->latest()->get();
        return view('admin.department_contents.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['type'] = $request->query('type');
        $data['typeName'] = str_replace('_', ' ', $data['type']);
        $data['departments'] = manage_department_model::latest()->get();

        return view('admin.department_contents.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departmentContent = new DepartmentContent();

        $this->validate($request, $departmentContent->validationRules());

        $data = $request->all();
        // store news data
        $departmentContent->fill($data)->save();

        $data['typeName'] = str_replace('_', ' ', $data['type']);

        return redirect('admin/department_contents?type=' . $data['type'])->with('success', $data['typeName'] . ' Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentContent $department_content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DepartmentContent $department_content)
    {
        $data['type'] = $request->query('type');
        $data['typeName'] = str_replace('_', ' ', $data['type']);
        $data['departments'] = manage_department_model::latest()->get();
        $data['departmentContent'] = $department_content;

        return view('admin.department_contents.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentContent $department_content)
    {
        $this->validate($request, $department_content->validationRules());

        $data = $request->all();
        // store news data
        $department_content->fill($data)->save();

        $data['typeName'] = str_replace('_', ' ', $data['type']);

        return redirect('admin/department_contents?type=' . $data['type'])->with('success', $data['typeName'] . ' Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DepartmentContent $department_content)
    {
        $typeName = str_replace('_', ' ', $request->query('type'));
        $department_content->delete();

        return redirect()->back()->with('success', $typeName . ' Deleted Successfully!');
    }
}
