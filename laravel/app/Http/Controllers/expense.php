<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use  App\Http\Controllers\Controller;
 use Session;
 use Validator;
 use  App\expense_model ;
 use App\expense_child_model ;
 use Redirect;
use App\chart_of_accounts_model;

class expense extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:EXPENSE'); 
     }
    public function index()
    {
        $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $expense_info=chart_of_accounts_model::where('parent_account','Expense')->get();
return view('admin.Account.expense',['expense_info'=>expense_model::all(),'asset_account'=>$asset_account,'expense_account'=>$expense_info]);
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

        // echo "Its working";
        // exit();
      //somosa de

            $expense_info=new expense_model;
            $validation=Validator::make($request->all(),$expense_info->expence_validate());
          if($validation->fails())
             {
               return back()->withInput()->withErrors($validation);
             }
            else
             {
              $expense_data=$request->all();
              $expense_data=array_add($expense_data,'expense_id',time());
              $expense_info->fill($expense_data)->save();
               $expense_child_data=$request->all();
               $expense_child_data=array_add($expense_child_data,'expense_id',time());
               if(!empty($request->purpose) and !empty($request->amount) and !empty($request->allocate_amount) and !empty($request->party_name))
                {
                     $expense_child_info=new expense_child_model ;
                    $expense_child_info->fill($expense_child_data)->save();
                }
         
           }
         
       Session::flash('success','Journal Information Are Succesfully Added On COA List');
       return Redirect::back();
      

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
        $asset_account=chart_of_accounts_model::where('parent_account','Asset')->get();
        $expense_info=chart_of_accounts_model::where('parent_account','Expense')->get();

        return view ('admin.Account.Edit.expense_edit',['expense_info'=>expense_model::where('expense_id',$id)->first(),
                     'expense_child_info'=>expense_child_model::where('expense_id',$id)->first(),'asset_account'=>$asset_account,'expense_account'=>$expense_info]);
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
        
    
        $expense_info=new expense_model;
        $expense_info::where('expense_id',$id)->first()->fill($request->all())->save();
        $expense_child_info=new expense_child_model;
        $expense_child_info::where('expense_id',$id)->first()->fill($request->all())->save();
        Session::flash('success',"$request->journal_title Information Succesfully Submited");
        return Redirect::back();
     
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             expense_model::where('expense_id',$id)->delete();
            expense_child_model::where('expense_id',$id)->delete();
           
     
          Session::flash('success', "Expense $id  Data Succesfully Deleted");
        return Redirect::back();
    }
}
