<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\Schollership;
use Illuminate\Http\Request;

class SchollershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['schollerships'] = Schollership::latest()->get();
        return view('admin.schollerships.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::latest()->get();

        return view('admin.schollerships.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schollership = new Schollership();

        $this->validate($request, $schollership->validationRules());

        $data = $request->all();
        // store news data
        $schollership->fill($data)->save();

        return redirect('admin/schollerships')->with('success', 'Schollership Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schollership $schollership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schollership $schollership)
    {
        $data['departments'] = manage_department_model::latest()->get();
        $data['schollership'] = $schollership;

        return view('admin.schollerships.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schollership $schollership)
    {
        $this->validate($request, $schollership->validationRules());

        $data = $request->all();
        // store news data
        $schollership->fill($data)->save();

        return redirect('admin/schollerships')->with('success', 'Schollership Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schollership $schollership)
    {
        $schollership->delete();
        return redirect()->back()->with('success', 'Schollership Deleted Successfully!');
    }
}
