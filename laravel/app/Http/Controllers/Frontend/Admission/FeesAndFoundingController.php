<?php

namespace App\Http\Controllers\Frontend\Admission;

use App\MetaData;
use App\OtherFee;
use App\Manage_tution_fees_model;
use App\Http\Controllers\Controller;

class FeesAndFoundingController extends Controller
{
    public function show()
    {
        $data['tutionFees'] = Manage_tution_fees_model::where('session', session()->get('school')->default_session)->get();
        $data['metaData'] = MetaData::where('meta_type', 'Fees and Funding')->pluck('meta_value', 'meta_key');
        $data['otherFees'] = OtherFee::where('session', session()->get('school')->default_session)->get();

        return view('frontend.admission.fees-and-funding', $data);
    }
}
