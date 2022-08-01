<!DOCTYPE html>
<html>
<head>
    <title>{{$student_data->student_name}}</title>
    <link rel="icon" type="image/gif" href="../img/backend/student/{{$student_data->roll}}.jpg" />
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;}">

   
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/print_format.css')}}">

<div class="heading-wrapper"> 
    <p class="margin">Home > Student Information >{{$student_data->student_name}}</p>
</div>



<div class="system-wrapper"> 
    <p class="margin">
      {{Session::get('school.system_name')}}({{Session::get('school.school_eiin')}})<br>
      {{Session::get('school.address')}}<br>
      {{Session::get('school.Phone')}}<br>
      {{Session::get('school.country')}}<br>
      {{Session::get('school.postal_code')}}
      
      
    </p>
</div>
<style type="text/css"></style>

    <div class="form-print-wrapper">
        <div class="print-tool-bar">
            <div class="tool-bar-standrad"><select><option>Standrad</option></select></div>
            <div class="Langugae"><select><option>English</option></select></div>
            <div class="letter-head"><input type="checkbox" checked="" name="">Letter Head</div>
            <div>
                <div class="btn-group tool">
                    <a onclick="printDiv()" class="btn-print-print btn-sm btn btn-default"><strong>Print</strong></a>
                    <a class="btn-print-edit btn-sm btn btn-default">Customize</a>        
                    <a class="btn-print-preview btn-sm btn btn-default">Full Page</a>        
                    <a class="btn-download-pdf btn-sm btn btn-default"> PDF</a>        
                </div>
            </div>
        </div>
        <div class="print_preview_wrapper">
            <div id="print-preview" class="print-preview">
              <div class="print-format">
                <div class="page-break" style="display: flex; flex-direction: column;">
                    <div class="header"></div>
                    <div class="body_section">
                    <p style="text-align: center;font-size: 20px" class="text-center">Student CV<p>

                        &nbsp;&nbsp;{{$student_data->student_name}}<br>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; {{$student_data->email}} <br>
                        <i class="fa fa-phone" aria-hidden="true"></i> &nbsp; {{$student_data->phone}} <br>

                        <hr>

                        <div class="personal_details">


                          <div class="personal_details_wrapper">
                            <p style="text-align: center; font-size: 15px">Personal Details</p>
                            <div style="float: left;width: 70%">
                              

                              <table>
                                    <tr>
                                      <td>Class Name</td>
                                      <td>:</td>
                                      <td>{{$student_data->class}}</td>
                                    </tr>

                                    <tr>
                                      <td>Department Name</td>
                                      <td>:</td>
                                      <td>{{$student_data->department}}</td>
                                    </tr>


                                    <tr>
                                      <td>Section Name</td>
                                      <td>:</td>
                                      <td>{{$student_data->section}}</td>
                                    </tr>


                                    <tr>
                                      <td>Roll Number</td>
                                      <td>:</td>
                                      <td>{{$student_data->roll}}</td>
                                    </tr>

                                    <tr>
                                      <td>Registration Number</td>
                                      <td>:</td>
                                      <td>{{$student_data->reg_number}}</td>
                                    </tr>

                                    <tr>
                                      <td>Birth Date</td>
                                      <td>:</td>
                                      <td>{{$student_data->birth_date}}</td>
                                    </tr>

                                    

                                    <tr>
                                      <td>Student Type</td>
                                      <td>:</td>
                                      <td>{{$student_data->type}}</td>
                                    </tr>
                                  </table>
                                </div>

                                <div class="picture_part" style="float: left;width: 30%"> 
                                    <img style='height: 120px;width:120px;border: 1px black solid;' src="../img/backend/student/{{$student_data->roll}}.jpg" onerror="this.src='img/blankavatar.png"  class='img-responsive'>
                                </div>

                            </div>
                           

                            

                            
                        </div>

                    </div>


                    <div class="gurdian_details">
                      <p style="text-align: center;font-size: 15px">Guridan Details</p>
                      <table>
                              <tr>
                                <td>{{$student_data->relation}} Name</td>
                                <td>:</td>
                                <td>{{$student_data->name}}</td>
                              </tr>

                              <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td>{{$student_data->phone}}</td>
                              </tr>


                              <tr>
                                <td>Profession</td>
                                <td>:</td>
                                <td>{{$student_data->profession}}</td>
                              </tr>

                            </table>
                    </div>


                     <div class="address">
                      <p style="text-align: center;font-size: 15px">Educational Qualifications</p>
                      <table style="width: 100%">
                              <tr style="background: #f5f7fa;height: 20px;border-bottom: 1px black solid">
                                <td>Exam Name</td>
                                <td>Board</td>
                                <td>Reg No</td>
                                <td>Roll No</td>
                                <td>Group</td>
                                <td>Passing Year</td>
                                <td>Gpa</td>
                              </tr>
                              @forelse($educational_info as $educational_info_data)
                              <tr>
                                <td>{{$educational_info_data->exam_name}}</td>
                                <td>{{$educational_info_data->borad}}</td>
                                <td>{{$educational_info_data->reg_no}}</td>
                                <td>{{$educational_info_data->roll_no}}</td>
                                <td>{{$educational_info_data->group}}</td>
                                <td>{{$educational_info_data->passing_year}}</td>
                                <td>{{$educational_info_data->gpa}}</td>
                              </tr>
                              @empty
                                <tr><td colspan="7">Please Attached It</td></tr>
                              @endforelse

                            </table>

                    </div>




                    <div class="address">
                      <p style="text-align: center;font-size: 15px">Address</p>
                      <table style="width: 100%">
                              <tr style="background: #f5f7fa;height: 20px;border-bottom: 1px black solid">
                                <td>Post Office</td>
                                <td>Home District</td>
                                <td>Division</td>
                                <td>Village Name</td>
                              </tr>

                              <tr>
                                <td>{{$student_data->post_office}}</td>
                                <td>{{$student_data->home_district}}</td>
                                <td>{{$student_data->division}}</td>
                                <td>{{$student_data->village_name}}</td>
                              </tr>

                            </table>

                    </div>


                    @if($hem_info)
                    <div class="address">
                      <p style="text-align: center;font-size: 15px">HEM Information</p>
                      <table style="width: 100%">
                              <tr style="background: #f5f7fa;height: 20px;border-bottom: 1px black solid">
                                    <th>Member No</th>
                                    <th>Group</th>
                                    <th>Village</th>
                                    <th>Section</th>
                                    <th>Zilla</th>
                              </tr>

                              <tr>
                                <td style="text-align: center;">{{$hem_info->hem_member_no}}</td>
                                <td style="text-align: center;">{{$hem_info->hem_group}}</td>
                                <td style="text-align: center;">{{$hem_info->hem_village}}</td>
                                <td style="text-align: center;">{{$hem_info->hem_section}}</td>
                                <td style="text-align: center;">{{$hem_info->hem_zilla}}</td>
                              </tr>

                            </table>

                    </div>
                    @endif

                    @if($office_copy_data)
                    <div class="address">
                      <p style="text-align: center;font-size: 15px">Reference Copy</p>
                      <table style="width: 100%">
                              <tr style="background: #f5f7fa;height: 20px;border-bottom: 1px black solid">
                                 <th>Inspection No</th>
                                 <th>Reference</th>
                              </tr>

                              <tr>
                                <td style="text-align: center;">{{$office_copy_data->inspection_no}}</td>
                                <td style="text-align: center;">{{$office_copy_data->reference}}</td>
                              </tr>

                            </table>

                    </div>
                    @endif



                    <div class="footer" style="text-align: center;margin-top: 40%">
                      <p>Software Develop by :TMSS ICT LTD.<br>https://tmss-ict.com/<br>tmssict@gmail.com</br>Contact : 880-2-55073530</p>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>






</body>
</html>




<script>
function printDiv()
        {
          var divToPrint=document.getElementById('print-preview');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<html> <style type="text/css">@font-face { font-family: Barcode; font-weight: bold; src: url("font-awesome/barcode/BarcodeFont.ttf")}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
          newWin.document.close();
        }
</script>













