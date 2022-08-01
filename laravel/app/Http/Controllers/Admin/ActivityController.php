<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['activities'] = Activity::latest()->get();
        return view('admin.activity.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::latest()->get();

        return view('admin.activity.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity();

        $this->validate($request, $activity->validationRules());

        $data = $request->all();
        // store news data
        $activity->fill($data)->save();

        return redirect('admin/activities')->with('success', 'Activity Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $data['departments'] = manage_department_model::latest()->get();
        $data['activity'] = $activity;

        return view('admin.activity.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $this->validate($request, $activity->validationRules());

        $data = $request->all();
        // store news data
        $activity->fill($data)->save();

        return redirect('admin/activities')->with('success', 'Activity Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->back()->with('success', 'Activity Deleted Successfully!');
    }
}
