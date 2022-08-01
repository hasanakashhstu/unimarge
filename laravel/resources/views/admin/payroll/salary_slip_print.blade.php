<!DOCTYPE html>
<html>
<head>
    <title></title>
   
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;}">

   
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/print_format.css')}}">

<div class="heading-wrapper"> 
    <p class="margin">Home > Student Information ></p>
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
                    
                        
                        <div style="text-align: center;">{{Session::get('school.system_name')}}</div>
                        <div style="text-align: center;margin-top: 20px"><u>Salary Slip</u></div>

                        <table>
                            <tr>
                              <td>Employee Type</td>
                              <td>:</td>
                              <td>{{$slip_data->type}}</td>
                            </tr>

                            <tr>
                              <td>ID</td>
                              <td>:</td>
                              <td>{{$slip_data->person_id}}</td>
                            </tr>

                            <tr>
                              <td>Person Name</td>
                              <td>:</td>
                              <td>{{$slip_data->person_name}}</td>
                            </tr>


                            <tr>
                              <td>Payroll Frequency</td>
                              <td>:</td>
                              <td>{{$slip_data->payroll_frequency}}</td>
                            </tr>

                            <tr>
                              <td>Payroll Grade / Title</td>
                              <td>:</td>
                              <td>{{$slip_data->salary_structure}}</td>
                            </tr>

                        </table>






                        <table style="margin-top: 10%;width: 100% ; border: 1px black solid"  cellspacing="0" cellpadding="0">
                            <tr style="border-bottom: black 1px solid">
                              <td style="width: 50%">Total Earning</td>
                              
                              <td>{{$slip_data->total_earning}}</td>
                            </tr>


                            <tr>
                              <td>Total Deduction</td>
                              
                              <td>{{$slip_data->total_deduction}}</td>
                            </tr>

                           

                        </table>


                        <div style="margin-top: 10%; text-align: right">Round Of : {{$slip_data->round_of}}</div>
                        <div style="text-align: right">Gross Salary : {{$slip_data->gross_salary}}</div>


                        <div style="text-align: left">Slip Create Date : {{$slip_data->created_at}}</div>


                    </div>


                    



                    



                    <div class="footer" style="text-align: center;margin-top: 40%">
                      <p>Software Develop by :Codebool software company Limited<br>http://codebool.com<br>info@codebool.com</br>Contact : 01735983167 </p>
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













