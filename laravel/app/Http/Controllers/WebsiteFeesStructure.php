<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteFeesStuctureModel;
use App\manage_department_model;

class WebsiteFeesStructure extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['feesStructures'] = WebsiteFeesStuctureModel::latest()->get();
        $data['departments'] = manage_department_model::latest()->get();

        return view('website.backend.fees_structure_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::latest()->get();

        return view('website.backend.add_fees_structure', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feesStructure = new WebsiteFeesStuctureModel;
        $this->validate($request, $feesStructure->validation());

        $feesStructure->fill($request->all())->save();

        return redirect('frontend/fees_structure')->with('success', 'Fees structure added successfully!');
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
    public function edit(WebsiteFeesStuctureModel $fees_structure)
    {
        $data['feesStructure'] = $fees_structure;
        $data['departments'] = manage_department_model::latest()->get();

        return view('website.backend.edit_fees_structure', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteFeesStuctureModel $fees_structure)
    {
        $this->validate($request, $fees_structure->validation());

        $fees_structure->fill($request->all())->save();

        return redirect('frontend/fees_structure')->with('success', 'Fees structure updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteFeesStuctureModel $fees_structure)
    {
        $fees_structure->delete();

        return redirect('frontend/fees_structure')->with('success', 'Fees structure deleted successfully!');
    }
}
