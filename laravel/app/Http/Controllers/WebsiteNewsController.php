<?php

namespace App\Http\Controllers;

use App\WebsiteNewsModel;
use Illuminate\Http\Request;
use App\manage_department_model;
use App\Services\StorageService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebsiteNewsController extends Controller
{
    use StorageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['newsList'] = WebsiteNewsModel::latest('website_news_id')->get();
        $data['departments'] = manage_department_model::all();
        return view('website.backend.index_news', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = manage_department_model::all();
        return view('website.backend.add_news', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $websiteNews = new WebsiteNewsModel;
        $validation = Validator::make($request->all(), $websiteNews->validation());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $formData = $request->all();
            $request->hasfile('file') && $formData['file'] = $this->uploadFile($request->file('file'), 'news');
            // store news data
            $websiteNews->fill($formData)->save();

            return redirect('frontend/news')->with('success', 'News Created Successfully!');
        }
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
        $data['news'] = WebsiteNewsModel::findOrFail($id);
        $data['departments'] = manage_department_model::all();
        return view('website.backend.edit_news', $data);
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
        $websiteNews = WebsiteNewsModel::findOrFail($id);
        $validation = Validator::make($request->all(), $websiteNews->validation(true));
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $formData = $request->all();

            $request->hasfile('file') && $formData['file'] = $this->uploadFile($request->file('file'), 'news', $websiteNews->file);
            // store news data
            $websiteNews->fill($formData)->save();

            return redirect('frontend/news')->with('success', 'News Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $websiteNews = WebsiteNewsModel::findOrFail($id);
        $websiteNews->file && Storage::delete($websiteNews->file);
        $websiteNews->delete();
        return redirect()->back()->with('success', 'News Deleted Successfully!');
    }
}
