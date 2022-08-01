<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Result;

class ResultController extends Controller
{
    public function index()
    {
        $data['results'] = Result::latest()->paginate(15);
        return view('frontend.results.results_index', $data);
    }

    public function show(Result $result)
    {
        return view('frontend.results.results_show', ['result' => $result]);
    }
}
