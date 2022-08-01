@extends('admin.index')
@section('Title','language_settings')
@section('breadcrumbs','language_settings')
@section('breadcrumbs_link','/language_settings')
@section('breadcrumbs_title','language_settings')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $("#language").click(function(){
      $("#list").show();
      $("#addparse").hide();
      $("#addlanguage").hide();
    });
    $("#parse").click(function(){

      $("#addparse").show();
      $("#addlanguage").hide();
      $("#list").hide();
    });
    $("#add").click(function(){
      $("#addlanguage").show();
      $("#list").hide();
      $("#addparse").hide();

    });
 });

</script>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Form wizard</a> </div>
    <h1>Language Settings</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Language&amp; Settings</h5>
          </div>
          <div class="form-actions">
            <button type="submit" id="language" class="btn btn-success">Language List</button>
            <button type="submit" id="parse" class="btn btn-success">Add Parse</button>
            <button type="submit" id="add" class="btn btn-success">Add Language</button>
          </div>
    <div class="container-fluid" id="list" hidden="hidden">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
              <h5>Static table</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Language</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd gradeX">
                    <td>Trident</td>
                    <td>
                    <input type="submit" class="btn btn-success" value="Option"/>
                    </td>
                  </tr>
                  <tr class="even gradeC">
                    <td>Trident</td>
                    <td><input type="submit" class="btn btn-success" value="Option"/></td>
                  </tr>
                  <tr class="odd gradeA">
                    <td>Trident</td>
                    <td><input type="submit" class="btn btn-success" value="Option"/></td>
                  </tr>
                  <tr class="even gradeA">
                    <td>Trident</td>
                    <td><input type="submit" class="btn btn-success" value="Option"/></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
  <div class="span12" hidden="hidden">
    <div class="control-group span4" id="addparse"  style="margin-left:20px;">
      <label class="control-label">Add Parse:</label>
      <div class="controls">
          <input type="text" class="span11" />
          <input type="submit" class="btn btn-success" value="Add"/>
      </div>
    </div>
    <div class="control-group span4" id="addlanguage">
      <label class="control-label">Add Language:</label>
      <div class="controls">
          <input type="text" class="span11" />
          <input type="submit" class="btn btn-success" value="Add"/>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

@stop