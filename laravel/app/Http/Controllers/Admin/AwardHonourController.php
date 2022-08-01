<?php

namespace App\Http\Controllers\Admin;

use App\AwardHonour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

class AwardHonourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->cannot('view awards and honours'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['awardHonours'] = AwardHonour::where('teacher_id', Auth::user()->teacher->teacher_id)->latest()->get();
        } else {
            $data['awardHonours'] = AwardHonour::latest()->get();
        }

        return view('admin.award_honours.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->cannot('create awards and honours'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['teachers'] = Teacher::where('user_id', Auth::id())->get();
        } else {
            $data['teachers'] = Teacher::latest()->get();
        }

        return view('admin.award_honours.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create awards and honours'), 403);

        $awardHonour = new AwardHonour();

        $this->validate($request, $awardHonour->validationRules());

        $data = $request->all();
        // store news data
        $awardHonour->fill($data)->save();

        return redirect('admin/award_honours')->with('success', 'Awards and Honours Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AwardHonour $award_honour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AwardHonour $award_honour)
    {
        abort_if(Auth::user()->cannot('edit awards and honours'), 403);

        if (Auth::user()->hasAnyRole('teacher', 'staff')) {
            $data['teachers'] = Teacher::where('user_id', Auth::id())->get();
        } else {
            $data['teachers'] = Teacher::latest()->get();
        }
        
        $data['awardHonour'] = $award_honour;

        return view('admin.award_honours.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AwardHonour $award_honour)
    {
        abort_if(Auth::user()->cannot('edit awards and honours'), 403);

        $this->validate($request, $award_honour->validationRules());

        $data = $request->all();
        // store news data
        $award_honour->fill($data)->save();

        return redirect('admin/award_honours')->with('success', 'Awards and Honours Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AwardHonour $award_honour)
    {
        abort_if(Auth::user()->cannot('delete awards and honours'), 403);

        $award_honour->delete();
        return redirect()->back()->with('success', 'Awards and Honours Deleted Successfully!');
    }
}
