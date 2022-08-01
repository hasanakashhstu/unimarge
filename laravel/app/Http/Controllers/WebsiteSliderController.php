<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteSliderModel;
use Validator;
use Redirect;
use Session;
use File;
use Image;

class WebsiteSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['slider'] = WebsiteSliderModel::all();
        return view('website.backend.add_slider',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new WebsiteSliderModel;
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else{
            $requested_data = $request->all();

            if ($request->hasfile('image')){
                $file_path = "img/";
                $file_name = time() . ".jpg";
                $image = $request->file('image');
                $img = Image::make($image->path());
                $img->resize(632, 632, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($file_path.'/'.$file_name);
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path.$file_name;
//                dd($requested_data,$img);
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
            return Redirect::back();
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
        $data['slider'] = WebsiteSliderModel::findOrFail($id);
        return view('website.backend.edit_slider',$data);
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
        $data = WebsiteSliderModel::findOrFail($id);
        $validate = Validator::make($request->all(),$data->validation());
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }else{
            $requested_data = $request->all();

            if ($request->hasfile('image')){
                if(File::exists($data->image)) {
                    File::delete($data->image);
                }
                $file_path = "img/";
                $file_name = time() . ".jpg";
                $image = $request->file('image');
                $img = Image::make($image->path());
                $img->resize(632, 632, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($file_path.'/'.$file_name);
                $request->file('image')->move($file_path, $file_name);

                $requested_data['image'] = $file_path.$file_name;
            }

            $data->fill($requested_data)->save();
            Session::flash('success', "Added Successfully");
            return redirect('/frontend/slider');

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
        $data = WebsiteSliderModel::findOrFail($id);
        if(File::exists($data->image)) {
            File::delete($data->image);
        }
        $data->delete();
        Session::flash('success', "Deleted Successfully");
        return Redirect::back();
    }
}
