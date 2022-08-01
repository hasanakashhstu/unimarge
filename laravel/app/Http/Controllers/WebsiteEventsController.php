<?php

namespace App\Http\Controllers;

use App\manage_department_model;
use App\Services\StorageService;
use App\WebsiteEventsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteEventsController extends Controller
{
    use StorageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['events'] = WebsiteEventsModel::latest('start_date')->get();

        return view('website.backend.events_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::all();

        return view('website.backend.add_events', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $event = new WebsiteEventsModel();
        $this->validate($request, $event->validation());

        $data = $request->all();
        $request->hasFile('image') && $data['image'] = $this->uploadFile($request->file('image'), 'events');
        $event->fill($data)->save();

        return redirect('frontend/events')->with('success', 'Event Added Successfully');
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
        $data['event'] = WebsiteEventsModel::findOrFail($id);
        $data['departments'] = manage_department_model::all();

        return view('website.backend.edit_events', $data);
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
        $event = WebsiteEventsModel::findOrFail($id);
        $this->validate($request, $event->validation(true));

        $data = $request->all();
        $request->hasFile('image') && $data['image'] = $this->uploadFile($request->file('image'), 'events', $event->image);
        $event->fill($data)->save();

        return redirect('frontend/events')->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = WebsiteEventsModel::findOrFail($id);
        $event->image && Storage::delete($event->image);
        $event->delete();

        return redirect()->back()->with('success', 'Event Deleted Successfully');
    }
}
