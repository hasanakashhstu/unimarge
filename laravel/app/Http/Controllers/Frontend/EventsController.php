<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\WebsiteEventsModel;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', '');
        if ($type == 'recent') {
            $data['type'] = $type;
            $data['events'] = WebsiteEventsModel::where('start_date', '<', date('Y-m-d'))->latest('start_date')->paginate(15);
        } elseif ($type == 'upcomming') {
            $data['type'] = $type;
            $data['events'] = WebsiteEventsModel::where('start_date', '>=', date('Y-m-d'))->latest('start_date')->paginate(15);
        } else {
            $data['type'] = '';
            $data['events'] = WebsiteEventsModel::latest('start_date')->paginate(15);
        }

        return view('frontend.events.events_index', $data);
    }

    public function show(WebsiteEventsModel $event)
    {
        return view('frontend.events.events_show', ['event' => $event]);
    }
}
