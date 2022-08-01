@extends('admin.index')
@section('Title','sms_settings')
@section('breadcrumbs','sms_settings')
@section('breadcrumbs_link','/sms_settings')
@section('breadcrumbs_title','sms_settings')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#sms").click(function(){
    $("#option").show();
    $("#second").hide();
    $("#input").hide();
  });
  $("#tell").click(function(){
    $("#input").show();
    $("#option").hide();
    $("#second").hide();
  });
  $("#twilio").click(function(){
    $("#second").show();
    $("#option").hide();
    $("#input").hide();
  });
});
</script>
<!--close-left-menu-stats-sidebar-->

<div class="container">
      <h2><i class="fa fa-car" aria-hidden="true"></i>&nbsp;Assign Transport</h2> <!-- Tab Heading  -->
    <p title="Transport Details">I School Managment  Assign Transport</p> <!-- Transport Details -->


<div class="container-fluid">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
      <h5>Sms</h5>
    </div>
    <div class="control-group" style="margin-left:35px;">
    </br>
      <label class="control-label">
       <button type="submit" class="btn btn-success" id="sms">Select A SMS Service</button>
       <button type="submit" class="btn btn-success" id="tell">Click A tell Settings</button>
       <button type="submit" class="btn btn-success" id="twilio">Twilio Settings</button>
      </label>
    </div>
    <div class="span3">
    <div id="option">
      <select>
         <option>Not Selected</option>
         <option>Click A Tell</option>
         <option>Twilio</option>
         <option>Disable</option>
      </select>
    </div>
    <div id="input" hidden>
      <input type="text" class="form-control" placeholder="Clickatell Username"/>
      <input type="text" class="form-control" placeholder="Clickatell Password"/>
      <input type="text" class="form-control" placeholder="Clickatell Api Id"/>
    </div>
    <div id="second" hidden>
      <input type="text" class="form-control" placeholder="Twilio Account SID"/>
      <input type="text" class="form-control" placeholder="Authentication Token"/>
      <input type="text" class="form-control" placeholder="Registered Phone Number"/>
    </div>
</div>
</br></br>
      <div class="form-actions" style="margin-top:100px;">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
  </div>
 </div>
 </div>

@stop