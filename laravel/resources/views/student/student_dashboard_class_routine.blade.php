@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Class Routine')
@section('breadcrumbs','Student Dhasboard Class Routine')
@section('student_dasboard_content')
<!--<div class="container">  -->
 <table class="table table-responsive " style="background: #fff;width: 1109px;">
   <tbody>
    <tr style="background:#147F7F">
    <td class="text-center" colspan="2">
     <span style="font-size:19px; color:#FFFFFF;"><b>My Class Routine Information</b></span>
      </td>
    </tr>
    </tbody>
    </table>
<div class="row-fluid">
        <div class="span12" style="width: 1154px;margin-top: -30px;">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
              <h5>Class {{Session::get('class')}}  Routine</h5>
            </div>
            <div class="widget-content">
             <div class="todo">
               <div id="home" class="tab-pane fade in active">
                 <div class="panel panel-default" data-collapsed="0">
                   <div class="panel-body">

                     @foreach($section as $section_value)

               <div class="div_print_{{$section_value->section}}" style="overflow: scroll;">

             <div>
               <span>{{Session::get('school.system_name')}}</span><br>
               <span>Routine For Class : {{Session::get('class')}}</span><br>
               <span></span><br>
               <span style="margin-top: 3%;" class="text-center tag">Section Name : {{$section_value->section}}</span>
             </div>



                     <table class="table table-bordered" border="0" cellspacing="0" cellpadding="0">
                           <tbody>
                                  <?php
                 for ($i=1; $i <= 7; $i++) {

                 $sunday=DB::table('class_routine')->join('class_routine_start_child','class_routine.class_routine_id','=','class_routine_start_child.parent')
                     ->join('class_routine_end_child','class_routine.class_routine_id','=','class_routine_end_child.parent')->where('class_name',Session::get('class'))->where('section',$section_value->section)->where('class_day',$i)->orderby('class_starting_time','asc')->get();
                     ?>
                             <tr class="gradeA">

                               <td width="100"><?php
                               if ($i==1):
                                 echo "Saturday";
                               elseif ($i==2):
                                 echo "Sunday";
                               elseif ($i==3):
                                 echo "Monday";
                               elseif ($i==4):
                                 echo "Tuesday";
                               elseif ($i==5):
                                 echo "Wednesday";
                               elseif ($i==6):
                                 echo "Thursday";
                               elseif ($i==7):
                                 echo "Friday";
                               endif;
                               ?></td>

                                @foreach($sunday as $sunday_value)

                               <td>
                                <div>
                                  <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span style="color:crimson;font-size: 11px;">
                                      {{$sunday_value->subject}} 
                                    </span>
                                    <br/>
                                    ( <?php echo date("h.i A", $sunday_value->class_starting_time); ?> - <?php echo date("h.i A", $sunday_value->class_ending_time); ?>)
                                    <br/>
                                    <span>
                                      <br><span style="color: green">{{$sunday_value->teacher}}</span>
                                    </span>
                                  </button>
                                 
                                 </div>

                               </td>
                               @endforeach

                             </tr>
                             <?php
             }
             ?>
                           </tbody>
                     </table>
             </div>

              <button style="height: 30px;">
             <a id='print' target="_blank" onclick="pop_print_<?php echo $section_value->section ?>()" media='print'  title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></a>
             </button>

             <script type="text/javascript">

             function pop_print_<?php echo $section_value->section ?>(){
              w=window.open(null, 'Print_Page', 'scrollbars=yes');
              
              w.document.write('<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');
             
              w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

              
          w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
          w.document.write(jQuery('.div_print_<?php echo $section_value->section ?>').html());


              w.document.close();
              //w.print();
          }
             </script>
                     @endforeach
                   </div>
                 </div>
               </div>

             </div>
            </div>

          </div>
        </div>
      </div>

@stop