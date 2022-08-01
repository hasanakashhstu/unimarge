@extends('website.index')
@section('website_main_section')
	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">

          <div class="panel panel-primary">
              <div class="panel-heading">Class Routine of {{$department_name}} - {{$semester}}</div>
              <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <div>
                        <div>
                          <div>
                            <div>
                              @foreach($medium_grp as $medium_grp_data)        
                                @foreach($department as $department_value)
                                  @foreach($section as $section_value)
                                  <div class="test div_print_{{$section_value->section}}" style="overflow: scroll;">
                                    <table class="table table-bordered" border="2" cellspacing="0" cellpadding="0">
                                      <tbody>
                                        <?php
                                             $classes=DB::table('class_routine')
                                             ->where('class_name',$class_name)
                                            ->where('section',$section_value->section)
                                            ->where('department',$department_value->department)
                                            ->where('medium',$medium_grp_data->medium)
                                            ->select(DB::raw('COUNT(*) as total_class'),'class_routine_id')
                                            ->groupBy('class_day')
                                            ->get()->toArray();
                                            $most_class=collect($classes)->max('total_class');
                                        ?>
                                        <tr class="gradeA">
                                          <style type="text/css">
                                            .head{
                                                  width:28px;
                                                  height:28px;
                                                  position:relative;

                                                }
                                            .head:before{
                                                content: "Period";
                                                position: absolute;
                                                margin-left: 40%;
                                                margin-top: -4%;
                                            }
                                            .head:after{
                                              content: "Day";
                                              position: absolute;
                                              border-top: 1px solid red;
                                              text-align: center;
                                              width: 65px;
                                              transform: rotate(24deg);
                                              transform-origin: 0% 0%;
                                            }
                                          </style>
                                            <?php 
                                              for ($j=0; $j <= $most_class ; $j++) 
                                              { 
                                            ?>
                                            <td 
                                                @if($j==0)
                                                class="head"
                                                @endif
                                                @if($j!=0) 
                                                style="text-align: center;font-size: 12px;font-weight: bold;"  
                                                @endif
                                              >
                                              <?php
                                                if($j==0)
                                                {
                                                  echo '';
                                                }
                                                elseif($j==1)
                                                {
                                                  echo $j.'<sup>st</sup> Period';
                                                }
                                                elseif($j==2)
                                                {
                                                  echo $j.'<sup>nd</sup> Period';
                                                }
                                                elseif($j==3)
                                                {
                                                  echo $j.'<sup>rd</sup> Period';
                                                }
                                                else
                                                {
                                                  echo $j.'<sup>th</sup> Period';
                                                }
                                              ?>
                                            </td>
                                            <?php  
                                              }
                                            ?>
                                        </tr>

                                        <?php
                                          for ($i=1; $i <= 6; $i++) {
                                          $sunday=DB::table('class_routine')->join('class_routine_start_child','class_routine.class_routine_id','=','class_routine_start_child.parent')
                                              ->join('class_routine_end_child','class_routine.class_routine_id','=','class_routine_end_child.parent')
                                              ->where('class_name',$class_name)
                                              ->where('section',$section_value->section)
                                              ->where('department',$department_value->department)
                                              ->where('class_day',$i)
                                              ->where('medium',$medium_grp_data->medium)
                                              ->orderBy('class_routine_start_child.class_starting_time','ASC')
                                              ->get();
                                        ?>
                                        <tr>
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
                                          endif;
                                          ?></td>

                                          @foreach($sunday as $sunday_value)
                                          <td>
                                              <div>
                                                  <button style="height: 105px;;width: 230px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <span style="color:crimson">
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
                                  <br>
                                  <button>
                                   <a id='print' target="_blank" onclick="pop_print_<?php echo $section_value->section ?>()" media='print'  title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></a>
                                  </button>


                                  <style type="text/css">
                                    .hidden_div{display:none;}
                                   
                                    @media print {
                                     .hidden_div {
                                       display: block;
                                     }

                                    }
                                  </style>
                                  <script type="text/javascript">
                                    function pop_print_<?php echo $section_value->section ?>(){
                                        w=window.open(null, 'Print_Page', 'scrollbars=yes');
                                        
                                        w.document.write('<style>@page{size:landscape;border:black 2px solid}.head{height: 50px;}</style><html><head><title></title>');
                                       
                                        w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

                                        
                                    w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                                    w.document.write(jQuery('.div_print_<?php echo $section_value->section ?>').html());


                                        w.document.close();
                                        //w.print();
                                    }
                                  </script>
                                  @endforeach
                                  <br>
                                @endforeach  
                              @endforeach  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

        </div>
    </div>
@stop