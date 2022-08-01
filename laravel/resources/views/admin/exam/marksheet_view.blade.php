
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Almendra Display' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<div class="container">
                      

  <style type="text/css">
    .tec {
    font-family: 'Almendra Display';
    font-size: 55px;
    color: #3a3737;
    font-weight: 600;

  }
  body
  {
        color: #666;
  }
  
  </style>  
        <div class="row">
          
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
             
            <li><a href='/result'><button type="button" class="btn btn-primary">Back To Page</button></a>
              </li>
         
             </ul>
          </div>
 @if($no_result !='')
        <div  id="not_found_view" >
          <img style="margin-top: 63px;
    margin-left: 485px;" src="{{URL::asset('/img/no-result.png')}}">
  </div>
  @elseif($not_published !='')

    <div  id="not_publish_view" >
      <div style="
    border: solid red;    margin-top: 194px;
    width: 989px;
    margin-left: 514px;">
          <img style="
  margin-left: 462px;height: 73px;" src="{{URL::asset('/img/cross_unpublish_img.png')}}"><h4 style="margin-left: 352px;
    font-size: 28px;"><strong>Not Yet Result Publish</strong></h4>
</div>
  </div>
@else
<div id="print_view">
  <div  id="marksheet_view" >
        {!!$with_marksheet!!}
  </div>

</div>
  
    
@endif
  <button style="margin-top: 22px;" id='print' onclick='printDiv();'>
          <a   media='print' target="_blank"   title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></a>
  </button>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
  var searchOutput;
    $(document).ready(function(){
function printDiv() 
{

  var divToPrint=document.getElementById('print_view');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
    });

</script>
</body>
</html>


        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>


