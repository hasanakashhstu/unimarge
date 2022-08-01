<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\MetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(!$request->query('type'), 404);

        $data['metaType'] = $request->query('type');
        $data['metaData'] = MetaData::where('meta_type', $data['metaType'])->orderBy('sort_order', 'asc')->get();

        return view('auth.meta-data.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaData $metaData)
    {
        $data['metaType'] = $metaData->meta_type;
        $data['metaInfo'] = $metaData;

        return view('auth.meta-data.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaData $metaData)
    {
        $data = $request->validate([
            'meta_key'   => 'required|string',
            'title'      => 'nullable|string',
            'meta_value' => 'required|string',
            'sort_order' => 'nullable|integer|min:1',
        ]);

        $data['meta_key'] = Str::slug($data['meta_key'], '_');

        $metaData->update($data);

        return redirect()->route('auth.metaData.index', ['type' => $metaData->meta_type])->with(['success' => "$metaData->meta_type updated."]);
    }

    public function updateStatus(MetaData $metaData)
    {
        
    }
}
