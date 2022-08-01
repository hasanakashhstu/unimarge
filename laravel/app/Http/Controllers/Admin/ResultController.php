<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Result;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    use StorageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['results'] = Result::latest()->get();
        return view('admin.results.results_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.results.results_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new Result();

        $this->validate($request, $result->validationRules());

        $data = $request->all();

        $request->hasfile('file') && $data['file'] = $this->uploadFile($request->file('file'), 'results');
        // store news data
        $result->fill($data)->save();

        return redirect('admin/results')->with('success', 'Result Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return view('admin.results.results_edit', ['result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $this->validate($request, $result->validationRules(true));

        $data = $request->all();

        $request->hasfile('file') && $data['file'] = $this->uploadFile($request->file('file'), 'results', $result->file);
        // store news data
        $result->fill($data)->save();

        return redirect('admin/results')->with('success', 'Result Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->file && Storage::delete($result->file);
        $result->delete();
        return redirect()->back()->with('success', 'Result Deleted Successfully!');
    }
}
