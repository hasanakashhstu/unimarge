
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
               <div id="main">
                <div class="page-break" style="display: flex; flex-direction: column;">
                    <div class="header"></div>
                    <div class="body_section">

<div id="content">

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
 
          <style type="text/css" src="{{asset('css/ex_student.css')}}"></style>
          <div class="head">
                  <img src="../img/HS LOGO.png">
	              <h3>{{Session::get('school.system_name')}}({{Session::get('school.school_eiin')}})</h3>
	              <p> {{Session::get('school.address')}}</p>
          </div>
          <div>
            <p style="float: right;">29 August 2017</p>
          </div><br/>
          <h5 style="margin-left:20px;color:#2c3e50;">SL No: 01</h5>
          <div class="text-center">

            <h3 style="margin-left:5px; color:#2c3e50;">TO WHOM YOU CONCERN</h3>
            <hr style="width: 218px; margin-left: 224px;" />
          </div>
            <div id="text">
                This is to certify that &nbsp;<span class="im">{{$student_data->student_name}}</span> 
                son/daughter(father or mother)&nbsp;Name <span class="im">{{$parents_data->name}} </span>
               of Village: <span class="im"> {{$parents_data->village_name}}</span>
               Post Office: <span class="im">{{$parents_data->post_office}}</span> 
               Upzilla: <span class="im"> {{$parents_data->post_office}}</span> 
               District: <span class="im">{{$parents_data->home_district}}</span> 
               passed the <span class="im">J.S.C/S.S.C</span> 
               Certificate Examination of the year <span class="im">2017</span> 
               from this school under the Board of Intermediate and Secondary Education .
                Bearing Roll No. <span class="im">{{$student_data->roll}}</span>
               He/She secured GPA 5.00 in the scale of 5.00. 
               His/Her Registration No is <span class="im">{{$student_data->reg_number}}</span>
               for the Session <span class="im">{{$student_data->session}}</span> A.D. 
               Under the BISE,As per the record the date of his/her birth is 
               <span class="im">{{$student_data-> birth_date}}</span>
               While at school he/she was not involved in any activity subversive of the state or of school discipline.<br/>
               <span>I wish him/her every success in life.</span>
           </div>
         
          <div>
              <h4 class="sign">Principal</h4>
          </div><br/>
              
        <i class="fa fa-print" aria-hidden="true"></i>
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
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/ex_student.js')}}"></script>
@endpush
