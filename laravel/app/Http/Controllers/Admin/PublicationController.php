<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publication;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->cannot('view publication'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['publications'] = Publication::where('teacher_id', Auth::user()->teacher->teacher_id)->latest()->get();
        } else {
            $data['publications'] = Publication::latest()->get();
        }

        return view('admin.publication.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->cannot('create publication'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['teachers'] = Teacher::where('user_id', Auth::id())->get();
        } else {
            $data['teachers'] = Teacher::latest()->get();
        }

        return view('admin.publication.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create publication'), 403);

        $publication = new Publication;

        $this->validate($request, $publication->validationRules());

        $data = $request->all();
        // store news data
        $publication->fill($data)->save();

        return redirect('admin/publications')->with('success', 'Publication Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        abort_if(Auth::user()->cannot('edit publication'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['teachers'] = Teacher::where('user_id', Auth::id())->get();
        } else {
            $data['teachers'] = Teacher::latest()->get();
        }

        $data['publication'] = $publication;

        return view('admin.publication.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        abort_if(Auth::user()->cannot('edit publication'), 403);

        $this->validate($request, $publication->validationRules());

        $data = $request->all();
        // store news data
        $publication->fill($data)->save();

        return redirect('admin/publications')->with('success', 'Publication Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        abort_if(Auth::user()->cannot('delete publication'), 403);

        $publication->delete();
        return redirect()->back()->with('success', 'Publication Deleted Successfully!');
    }
}
