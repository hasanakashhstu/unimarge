<?php

namespace App\Http\Controllers\Web;

use App\OtherFee;
use App\ov_setup_model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtherFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->cannot('view department'), 403);
        
        $data['otherFees'] = OtherFee::orderBy('session', 'desc')->get();

        return view('auth.other-fee.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->cannot('create department'), 403);
        
        $data['sessions'] = ov_setup_model::where('type', 'Session')->orderBy('type_name', 'desc')->get();

        return view('auth.other-fee.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create department'), 403);

        $data = $request->validate([
            'session' => 'required|string',
            'name' => 'required|string',
            'per_semester_fee' => 'required|numeric',
        ]);

        OtherFee::create($data);

        return redirect()->back()->with('success', 'Other Fee created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherFee  $otherFee
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherFee $otherFee)
    {
        abort_if(Auth::user()->cannot('edit department'), 403);
        
        $data['sessions'] = ov_setup_model::where('type', 'Session')->get();
        $data['otherFee'] = $otherFee;

        return view('auth.other-fee.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherFee  $otherFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherFee $otherFee)
    {
        abort_if(Auth::user()->cannot('edit department'), 403);

        $data = $request->validate([
            'session' => 'required|string',
            'name' => 'required|string',
            'per_semester_fee' => 'required|numeric',
        ]);

        $otherFee->update($data);

        return redirect()->route('auth.otherFees.index')->with('success', 'Other Fee updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherFee  $otherFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherFee $otherFee)
    {
        abort_if(Auth::user()->cannot('delete department'), 403);

        $otherFee->delete();

        return redirect()->back()->with('success', 'Other Fee deleted.');
    }
}
