<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\WebsiteNewsModel;

class NewsController extends Controller
{
    public function index()
    {
        $data['newsList'] = WebsiteNewsModel::latest()->paginate(15);
        return view('frontend.news.news_index', $data);
    }

    public function show($id)
    {
        $data['news'] = WebsiteNewsModel::findOrFail($id);
        return view('frontend.news.news_show', $data);
    }
}
