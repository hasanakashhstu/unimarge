<?php

namespace App\Http\Controllers;
use Session;
use Crypt;
use Validator;
use App\chart_of_accounts_model;
use Illuminate\Http\Request;

class chart_of_account extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
       $this->middleware('permission:CHART_OF_ACCOUNT'); 
     }
     
    public function index()
    {
        

        return view('admin.Account.chart_of_account',['accounts'=>chart_of_accounts_model::all(),
            'assets_info'=>chart_of_accounts_model::where('parent_account','Asset')->get(),
            'expense_info'=>chart_of_accounts_model::where('parent_account','Expense')->get(),
            'liblaties_info'=>chart_of_accounts_model::where('parent_account','Liabilities')->get(),
            'income_info'=>chart_of_accounts_model::where('parent_account','Income')->get()
        ]);
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
        $chart_of_account=new chart_of_accounts_model;
        if($chart_of_account->where('account_name',$request->account_name)->first())
        {
            session()->flash('Error', "This Account Are Already In Here Duplicate Account Are Not Allowed");
            return back()->withInput();
        }
        else
        {
            $validation=Validator::make($request->all(),$chart_of_account->validation());
            if($validation->fails())
            {
               return back()->withInput()->withErrors($validation); 
            }
            else{
                $data=$request->all();
                $chart_of_account->fill($data)->save();
                session()->flash('success', "$request->account_name Are Added On Chart Of Account");
                return back()->withInput();
            }
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
        return view('admin.Account.chart_of_account_edit',['accounts'=>chart_of_accounts_model::where('id',$id)->first()]);
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
        $chart_of_account=new chart_of_accounts_model;
        
        $validation=Validator::make($request->all(),$chart_of_account->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else{
            $data=$request->all();
            chart_of_accounts_model::where('id',$id)->first()->fill($data)->save();
             session()->flash('success', " accounts updated successfully ");
            return back()->with('success','accounts updated successfully ');
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
      chart_of_accounts_model::where('id',$id)->delete();
    }
}
