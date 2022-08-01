<?php

namespace App\Http\Controllers\Auth;

use App\Administrative;
use App\AdministrativeOffice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->cannot('view administrative'), 403);

        $data['administratives'] = Administrative::orderBy('administrative_office_id')->get();

        return view('auth.administrative.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->cannot('create administrative'), 403);

        $data['offices'] = AdministrativeOffice::all();
        $data['teachers'] = Teacher::latest()->get();

        return view('auth.administrative.create', $data);
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
            'administrative_office_id' => 'required|integer',
            'type' => ['required', 'integer', Rule::in([1, 2, 3])],
            'teacher_id' => 'required|integer',
        ], [], [
            'administrative_office_id' => 'Office Name',
            'teacher_id' => 'Teacher'
        ]);

        // check unique head and member in the same administrative_office_id
        if ($data['type'] == 1) {
            $administrativeHead = Administrative::where('type', 1)->where('administrative_office_id', $data['administrative_office_id'])->first();
            if ($administrativeHead) {
                return redirect()->back()->with('error', 'This Person already added as a Head of ' . $administrativeHead->office->name);
            }
        } elseif ($data['type'] == 2) {
            $administrativeSubHead = Administrative::where('type', 2)->where('administrative_office_id', $data['administrative_office_id'])->where('teacher_id', $data['teacher_id'])->first();
            if ($administrativeSubHead) {
                return redirect()->back()->with('error', 'This Person already added as a Sub Head of ' . $administrativeSubHead->office->name);
            }
        } elseif ($data['type'] == 3) {
            $administrativeMember = Administrative::where('type', 3)->where('administrative_office_id', $data['administrative_office_id'])->where('teacher_id', $data['teacher_id'])->first();
            if ($administrativeMember) {
                return redirect()->back()->with('error', 'This Person already added as a Member of ' . $administrativeMember->office->name);
            }
        }

        // create administrative
        Administrative::create($data);

        return redirect()->route('auth.administratives.index')->with('success', 'Administrative created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Administrative $administrative)
    {
        abort_if(Auth::user()->cannot('view administrative'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrative $administrative)
    {
        abort_if(Auth::user()->cannot('edit administrative'), 403);

        $data['administrative'] = $administrative;
        $data['offices'] = AdministrativeOffice::all();
        $data['teachers'] = Teacher::latest()->get();

        return view('auth.administrative.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrative $administrative)
    {
        abort_if(Auth::user()->cannot('edit administrative'), 403);

        $data = $request->validate([
            'administrative_office_id' => 'required|integer',
            'type' => ['required', 'integer', Rule::in([1, 2, 3])],
            'teacher_id' => 'required|integer',
        ], [], [
            'administrative_office_id' => 'Office Name',
            'teacher_id' => 'Teacher'
        ]);

        // check unique head and member in the same administrative_office_id
        if ($data['type'] == 1) {
            $administrativeHead = Administrative::where('id', '!=', $administrative->id)->where('type', 1)->where('administrative_office_id', $data['administrative_office_id'])->first();
            if ($administrativeHead) {
                return redirect()->back()->with('error', 'This Person already added as a Head of ' . $administrativeHead->office->name);
            }
        } elseif ($data['type'] == 2) {
            $administrativeSubHead = Administrative::where('id', '!=', $administrative->id)->where('type', 2)->where('administrative_office_id', $data['administrative_office_id'])->where('teacher_id', $data['teacher_id'])->first();
            if ($administrativeSubHead) {
                return redirect()->back()->with('error', 'This Person already added as a Sub Head of ' . $administrativeSubHead->office->name);
            }
        } elseif ($data['type'] == 3) {
            $administrativeMember = Administrative::where('id', '!=', $administrative->id)->where('type', 3)->where('administrative_office_id', $data['administrative_office_id'])->where('teacher_id', $data['teacher_id'])->first();
            if ($administrativeMember) {
                return redirect()->back()->with('error', 'This Person already added as a Member of ' . $administrativeMember->office->name);
            }
        }

        // update administrative
        $administrative->update($data);

        return redirect()->route('auth.administratives.index')->with('success', 'Administrative updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrative $administrative)
    {
        abort_if(Auth::user()->cannot('delete administrative'), 403);

        $administrative->forceDelete();

        return redirect()->back()->with('success', 'Administrative deleted successfully!');
    }
}
