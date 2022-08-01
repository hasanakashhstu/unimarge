<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>TMSS Institute Of Science & ICT</title>
      <meta name="keywords" content="">
        <link href="{{asset('website/result/style.css')}}" rel="stylesheet" type="text/css">
        </head>
        <body class="nimbus-is-editor">
          <div class="container">
          <table style="margin-left: 14.5%; padding: 0px; width: 70%;" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td>
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <tbody>
                      <tr>
                        <td width="12" align="left" valign="top" >
                          <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                          </td>
                          <td valign="top" >
                            <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                            </td>
                            <td width="12" align="right" valign="top" >
                              <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                              </td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" >&nbsp;</td>
                              <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td width="142" height="121" align="center" valign="middle">
                                        <img src="{{asset('img/logo.png')}}" width="100%">
                                        </td>
                                        <td width="2">
                                          <img src="{{asset('website/result/trans.gif')}}" width="2" height="1">
                                          </td>
                                          <td valign="top" bgcolor="#007814">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tbody>
                                                <tr>
                                                  <td align="right">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tbody>
                                                        <tr>
                                                          <td align="left" valign="bottom">
                                                            <!-- <h1 id="site_title_des">Ministry of Education</h1> -->
                                                          </td>
                                                          <td align="right" valign="top">
                                                            
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                
                                                    <tr>
                                                      <td height="55" align="left">
                                                        <h1 style="text-align: right" id="site_title"> {{$general_settings->system_name}} <br> {{$general_settings->address}}</h1>
                                                      </td>
                                                    </tr>
                                                  
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <img src="{{asset('website/result/trans.gif')}}" width="1" height="1">
                                          </td>
                                          <td align="right" valign="top" >&nbsp;</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                                      <tbody>
                                        <tr>
                                          <td width="12" align="left" valign="top" >&nbsp;</td>
                                          <td valign="top">
                                            <!-- printer:start -->
                                            <!-- printer:end -->
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tbody>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                  <td>
@php
  $result_dept = collect($manage_department)->groupBy('department_name');
  $result_class = collect($manage_department)->groupBy('class_name');
@endphp                                                   
<!-- <form name="result" method="post" action="http://www.educationboardresults.gov.bd/result.php" onsubmit="return app_form_validator(this)"> -->

  <center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td width="74%">
          <fieldset style="margin-left: 18%;border: black 1px solid;border-style: dotted;">
            <table width="100%" border="0" cellpadding="3" cellspacing="0" class="black12bold">
              <tbody>
                <tr>
                  <td width="12%" align="left" valign="middle">&nbsp;</td>
                  <td width="24%" align="left" valign="middle">&nbsp;</td>
                  <td width="7%" align="left" valign="middle">&nbsp;</td>
                  <td width="46%" align="right" valign="middle">&nbsp;</td>
                  <td width="11%" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td width="12%" align="left" valign="middle">&nbsp;</td>
                  <td width="24%" align="left" valign="middle">Exam Name</td>
                  <td width="7%" align="left" valign="middle">:</td>
                  <td width="46%" align="right" valign="middle">


                    <select name="exam_name" class="textfield05" id="exam_info" onchange="fd(this);">
                      <option value="">Select One</option>
                      @foreach($exam as $fetch_exam_list)
                      <option value="{{$fetch_exam_list->exam_name}}">{{$fetch_exam_list->exam_name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td width="11%" align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">Class Name</td>
                  <td align="left" valign="middle">:</td>
                  <td align="right" valign="middle">
                    <select name="class_name" class="textfield05" id="class_info">
                      <option value="" selected="">Select One</option>
                      @foreach($result_class as $key => $value)
                      <option value="{{$key}}">{{$key}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">Section Name</td>
                  <td align="left" valign="middle">:</td>
                  <td align="right" valign="middle">
                    <select name="section" class="textfield05" id="section_info">
                      <option value="" selected="">Select One</option>
                    </select>
                  </td>
                  <td align="left" valign="middle">&nbsp;</td>
                </tr>
               
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">Department Name</td>
                  <td align="left" valign="middle">:</td>
                  <td align="right" valign="middle">
                    <select name="department_name" class="textfield05" id="Department_info">
                      <option value="" selected="">Select One</option><!-- 
                      @foreach($result_dept as $key => $value)
                      <option>{{$key}}</option>
                      @endforeach -->
                    </select>
                  </td>
                  <td align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="middle">&nbsp;</td>
                  <td align="left" valign="middle">Roll</td>
                  <td align="left" valign="middle">:</td>
                  <td align="right" valign="middle">
                  <input name="student_roll" type="text"  style='width: 194px'class="textfield06" id="student_roll" onkeypress="return onlyNumbers()">
                  </td>
                  <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="right" valign="middle">
                      <input type="reset" name="Reset" id="button" value="Reset">
                      <!-- <input type="submit" name="button2" id="button2" value="Submit"> -->
                      {{Form::button('Search',['class'=>'btn btn-success','id'=>'serach_btn_for_marksheet'])}}
                    </td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="right" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </fieldset>
          </td>
          <td width="13%">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    </center>
    <div  id="not_found_view" hidden="hidden" style="text-align: center;">
          <img style="height: 120px;" src="{{URL::asset('img/wrong_type.png')}}"> <br> Sorry ! No Data Found , Please Try Input Proper Information
    </div>
    <div id="not_publish_view" hidden="hidden" >
      <div style="border: solid red;margin-top: 63px; width: 931px;">
            <img style="margin-left: 462px;height: 73px;" src="{{URL::asset('/imgcross_unpublish_img.jpg')}}">
            <h4 style="margin-left: 352px; font-size: 28px;">
              <strong>Not Yet Result Publish</strong>
            </h4>
      </div>
    </div>

    <div class="mark_sheet">
      <div  id="marksheet_view"></div>
      <div id="print_btn_disable"> 
        <button class="print_button_show" style="margin-top: 22px;">
            <a id='print' onclick="sheet_print()" media='print'  target="_blank"  title='Print' type="button">Print</a>
        </button>
      </div>
    </div>
   
  <!-- </form> -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  <script >
    var baseUrl = '{{url('/')}}';
        console.log(baseUrl);
    function sheet_print(){
        w=window.open(null, 'Print_Page', 'scrollbars=yes');

        w.document.write('<style>@page{border:black 1px solid}body{height:1200px;}.mark_sheet{height: 1200px;}</style><html><head><title></title>');

        w.document.write('<body style="font-family:verdana; font-size:14px;width:100%;height:200%:" >');
        w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

        w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
        w.document.write(jQuery('.mark_sheet').html());
        w.document.close();
    }
 </script>
<script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>
                                                                </td>
                                                              </tr>
                                                              <tr>
                                                                <td>&nbsp;</td>
                                                              </tr>
                                                              <tr>
                                                                <td>&nbsp;</td>
                                                              </tr>
                                                              <tr>
                                                                <td>
                                                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <!-- printer:end -->
                                                                    <!-- printer:start -->
                                                                    <tbody>
                                                                      <tr bgcolor="#007814">
                                                                        <td style="font-size: 12px;text-align: center;" colspan="5">
                                                                          Copyright © TISI & Developed By : TMSS ICT LTD.
                                                                          </td>
                                                                        </tr>
                                                                       
                                                                        
                                                                                </tbody>
                                                                              </table>
                                                                            </td>
                                                                          </tr>
                                                                        </tbody>
                                                                      </table>
                                                                    </td>
                                                                    <td width="12" align="right" valign="top" >&nbsp;</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td align="left" valign="top" >
                                                                      <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                                                                      </td>
                                                                      <td valign="top" >
                                                                        <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                                                                        </td>
                                                                        <td align="right" valign="top">
                                                                          <img src="{{asset('website/result/trans.gif')}}" width="12" height="12">
                                                                          </td>
                                                                        </tr>
                                                                      </tbody>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td><a href="/">Go to home page</a></td>
                                                                </tr>
                                                              </tbody>
                                                            </table>

                                                            </div>
                                                          </body>
                                                        </html>










