<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\Services\StorageService;
use App\WebsiteEventModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use StorageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['event'] = WebsiteEventModel::latest()->get();

        return view('website.backend.event_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::all();

        return view('website.backend.add_event', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new WebsiteEventModel();
        $this->validate($request, $gallery->validation());

        $data = $request->all();
        $request->hasFile('image') && $data['image'] = $this->uploadFile($request->file('image'), 'galleries');
        $gallery->fill($data)->save();

        return redirect('admin/galleries')->with('success', 'Gallery Added Successfully');
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
        $data['event'] = WebsiteEventModel::findOrFail($id);
        $data['departments'] = manage_department_model::all();

        return view('website.backend.edit_event', $data);
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
        $gallery = WebsiteEventModel::findOrFail($id);
        $this->validate($request, $gallery->validation(true));

        $data = $request->all();
        $request->hasFile('image') && $data['image'] = $this->uploadFile($request->file('image'), 'galleries', $gallery->image);
        $gallery->fill($data)->save();

        return redirect('admin/galleries')->with('success', 'Gallery Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = WebsiteEventModel::findOrFail($id);
        $gallery->image && Storage::delete($gallery->image);
        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery Deleted Successfully');
    }
}
