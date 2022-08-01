<?php

namespace App\Http\Controllers\Auth;

use App\AdministrativeOffice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdministrativeOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->cannot('view administrative'), 403);

        $data['administrativeOffices'] = AdministrativeOffice::latest()->get();

        return view('auth.administrative-office.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->cannot('create administrative'), 403);

        return view('auth.administrative-office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Auth::user()->cannot('create administrative'), 403);

        $data = $request->validate([
            'name' => 'required|string|unique:administrative_offices',
        ]);

        $data['slug'] = Str::slug($data['name']);

        // create administrative office
        AdministrativeOffice::create($data);

        return redirect()->route('auth.administrativeOffices.index')->with('success', 'Office created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrativeOffice $administrativeOffice)
    {
        abort_if(Auth::user()->cannot('view administrative'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministrativeOffice $administrativeOffice)
    {
        abort_if(Auth::user()->cannot('edit administrative'), 403);

        $data['administrativeOffice'] = $administrativeOffice;

        return view('auth.administrative-office.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdministrativeOffice $administrativeOffice)
    {
        abort_if(Auth::user()->cannot('edit administrative'), 403);

        $data = $request->validate([
            'name' => 'required|string|unique:administrative_offices,name,' . $administrativeOffice->id,
        ]);

        $data['slug'] = Str::slug($data['name']);

        // update administrative office
        $administrativeOffice->update($data);

        return redirect()->route('auth.administrativeOffices.index')->with('success', 'Office updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrativeOffice $administrativeOffice)
    {
        abort_if(Auth::user()->cannot('delete administrative'), 403);

        $administrativeOffice->forceDelete();

        return redirect()->back()->with('success', 'Office deleted successfully!');
    }
}
