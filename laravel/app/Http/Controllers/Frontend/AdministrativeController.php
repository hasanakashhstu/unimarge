<?php

namespace App\Http\Controllers\Frontend;

use App\Administrative;
use App\AdministrativeOffice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AdministrativeController extends Controller
{
    public function show($slug)
    {
        $data['office'] = AdministrativeOffice::where('slug', $slug)->firstOrFail();
        $data['administrativeOffices'] = AdministrativeOffice::all();

        $data['headandSubHeads'] = Administrative::where('administrative_office_id', $data['office']->id)->whereIn('type', [1, 2])->orderBy('type')->get();
        $data['administrativeMembers'] = Administrative::where('administrative_office_id', $data['office']->id)->where('type', 3)->get();

        return view('frontend.administrative', $data);
    }
}
