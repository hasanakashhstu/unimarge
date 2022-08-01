<?php

namespace App\Http\Controllers\Admin;

use App\DepartmentContact;
use App\Http\Controllers\Controller;
use App\manage_department_model;
use Illuminate\Http\Request;

class DepartmentContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['departmentContacts'] = DepartmentContact::latest()->get();
        return view('admin.department_contacts.contacts_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::latest()->get();

        return view('admin.department_contacts.contacts_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departmentContact = new DepartmentContact();

        $this->validate($request, $departmentContact->validationRules());

        $data = $request->all();
        // store news data
        $departmentContact->fill($data)->save();

        return redirect('admin/department_contacts')->with('success', 'Contact Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentContact $departmentContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentContact $department_contact)
    {
        $data['departments'] = manage_department_model::latest()->get();
        $data['departmentContact'] = $department_contact;

        return view('admin.department_contacts.contacts_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentContact $department_contact)
    {
        $this->validate($request, $department_contact->validationRules());

        $data = $request->all();
        // store news data
        $department_contact->fill($data)->save();

        return redirect('admin/department_contacts')->with('success', 'Contact Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentContact $department_contact)
    {
        $department_contact->delete();
        return redirect()->back()->with('success', 'Contact Deleted Successfully!');
    }
}
