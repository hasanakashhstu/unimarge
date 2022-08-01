<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\salary_slip_model;
class salary_slip_report extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payroll.salary_slip_report',['salary_slip_info'=>salary_slip_model::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
