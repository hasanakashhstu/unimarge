<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Crypt;
use Validator;
use App\accountant_model;
use App\accountant_address_child;
use App\accountant_qualification_child;
use App\create_admin_model;
use File;
use App\ov_setup_model;
class accountant extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:ACCOUNTANT'); 
     }
    public function index()
    {
        $job_type=ov_setup_model::where('type','Job Type')->get();
        $work_department=ov_setup_model::where('type','Work Department')->get();
        $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.Account.new_accountant',['accountet_list'=>accountant_model::all(),'job_type'=>$job_type,'working_department'=>$work_department,'medium'=>$medium]);
        
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
        $accountant=new accountant_model;
        
        $validation=Validator::make($request->all(),$accountant->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else
        {
            $check_email=create_admin_model::where('email',$request->email)->first();
            if($check_email)
            {
                Session::flash('Error',"( $request->email ) Duplicate Already Here , Duplicate Email Are Not Allowed");
                return back()->withInput();
            }
            else
            {

                    $data=$request->all();
                    //$time=time();
                    $data=array_add($data,'accontant_id',time());
                    $data=array_add($data,'parent',time());
                    $data=array_set($data,'password',bcrypt($request->password));
                    
                    $data=array_add($data,'status','Active');
                    $data=array_add($data,'name',$request->accountant_name);
                    
                    $accountant->fill($data)->save();

                    if ($request->hasfile('image')) {
                       
                        $file_path='img/backend/accountant';
                        $file_name=time().'.jpg';
                        $request->file('image')->move($file_path,$file_name);

                    }
                    
          
                    

                        $accountant_address_child=new  accountant_address_child;
                        $accountant_address_child->fill($data)->save();
                    
                    
                    
                    
                        $accountant_qualification_child=new accountant_qualification_child;
                        $accountant_qualification_child->fill($data)->save();


                    if ($request->email) {

                        $create_admin_obj=new create_admin_model;
                        $create_admin_obj->fill($data)->save();
                        
                    }
                    

                    Session::flash('success',"$request->accountant_name Information Are Succesfully Inserted");
                    return back()->with('success',"$request->accountant_name Information Are Succesfully Inserted");

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
         $job_type=ov_setup_model::where('type','Job Type')->get();
        $work_department=ov_setup_model::where('type','Work Department')->get();
        $medium=ov_setup_model::where('type','Medium')->get();
        

        return view('admin.Account.accountant_edit',['accountant'=>accountant_model::where('accontant_id',$id)->first(),'accountant_address_child'=>accountant_address_child::where('parent',$id)->first(),'accountant_qualification_child'=>accountant_qualification_child::where('parent',$id)->first(),'job_type'=>$job_type,'working_department'=>$work_department,'medium'=>$medium]);
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
        $accountant=new accountant_model;
        $validation=Validator::make($request->all(),$accountant->validation());
        if($validation->fails())
        {
           return back()->withInput()->withErrors($validation); 
        }
        else
        {
            $accountant=$request->all(); 
            $accountant=array_except($accountant,'password'); 
            $accountant=array_add($accountant,'password',bcrypt($request->password));
         
            accountant_model::where('accontant_id',$id)->first()->fill($accountant)->save();
            accountant_address_child::where('parent',$id)->first()->fill($accountant)->save();
            accountant_qualification_child::where('parent',$id)->first()->fill($accountant)->save();

            if ($request->hasfile('image')) {
                       
                        $file_path='img/backend/accountant';
                        $file_name=$id.'.jpg';
                        $request->file('image')->move($file_path,$file_name);

                    }

            
            session()->flash('success', "$request->accountant_name Information Are Succesfully Updated ");
            return back()->with('success',"$request->accountant_name Information Are Succesfully Updated");           
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
       

        $my_file="img/backend/accountant/$id".".jpg";
        
        if (File::exists($my_file))
        {
             
            File::delete($my_file);
            

        }
        accountant_model::where('accontant_id',$id)->delete();
        accountant_address_child::where('parent',$id)->delete();
        accountant_qualification_child::where('parent',$id)->delete();
    }
}
