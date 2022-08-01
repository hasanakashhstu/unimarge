<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article_model;
class ListBookReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Report.list_book_report',['all_search_data'=>'','book_name'=>article_model::groupBy('article_name')->get()]);
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
       $table="";
    
        $serach_data=article_model::where(function($serach_data) use ($request) {
                     if($request->article_name !='all')
                     {
                        $serach_data->where('article_name',$request->article_name);
                     }
                     if ($request->article_name=='all') {
                        $serach_data->where('article_name','!=',"fcis");
                     }
                  
                     if($request->all)
                     {
                        $serach_data->where('article_name', 'LIKE', '%' . $request->all. '%');
                      
                     }
        })->groupBy('article_name')->get();

         
        
       //$tech_data=teacher_model::where('type','Tech')->groupBy('job_type')->get();
// $teach_id=0;
    
         
        
          $table.="<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
          $table.="<td >";
          
             $table.="<h4 style=\"color:#215663;font-size:25px; margin-bottom:-6px;text-align: center;\">
             Book List Report
              </h4>";
              $table.="<hr>";
             
            
           $table.="</td>";
         $table.="</table>";

  
       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
           $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Book Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Author Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Publisher</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Total Copies</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Available Copies</th>";
              $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Price</th>";
            $table.="</tr>";
        $table.="</thead>";

        $table.="<tbody>";
           
           foreach ($serach_data as $key=>$search_data_fetch) {
             $id=$key+1;
           $total_article=article_model::where('article_name',$search_data_fetch->article_name)->get()
                            ->Count();
          $stock_out_article=article_model::where('article_name',$search_data_fetch->article_name)->where('available_status','Not Avaialble')
                            ->get()
                            ->Count();
            $available_copies= $total_article-$stock_out_article;
            $total_price=$search_data_fetch->purchase_price*$total_article;
             $table.="<tr>";
                $table.="<td style=\"height: 29px;\">$id</td>";
                $table.="<td style=\"height: 29px;\">$search_data_fetch->article_name</td>";
                $table.="<td style=\"height: 29px;\">$search_data_fetch->author</td>";
                $table.="<td style=\"height: 29px;\">$search_data_fetch->publisher</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$total_article</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$available_copies</td>";
                $table.="<td style=\"height: 29px;\">$total_price</td>";

            $table.="</tr>";
              
      }
        $table.="</tbody>";
         $table.="</table>";
          
      


       

       return view('admin.Report.list_book_report',['all_search_data'=>$table,'book_name'=>article_model::groupBy('article_name')->get()]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
