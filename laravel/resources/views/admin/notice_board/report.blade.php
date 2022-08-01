@extends('admin.index')
@section('Title','Notice Board')
@section('breadcrumbs','Notice Board')
@section('breadcrumbs_link','/report')
@section('breadcrumbs_title','Notice Board')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#letterhead").click(function(){
  $(".head").slideToggle();
});
});

</script>
<div class="container-fluid"><hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box" style="background-color:#fff;border-color: black;">
        <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
          <h5>Report &amp; Settings</h5>
        </div>
        <div class="form-actions" style="background-color:#fff;">
          <input type="text" class="form-control" placeholder="Standard"/>
          <input type="text" class="form-control" placeholder="English"/>&nbsp;
          <input type="checkbox" id="letterhead">&nbsp;Remove Letter Head
                    <div  class="data">
                      <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                      <i class="fa fa-street-view" aria-hidden="true"></i>
                      <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
       </div>
  <div class="container-fluid" id="list">
    <div class="row-fluid">
      <div class="span12">
          <style type="text/css">
            .head{
                 text-align: center;
                 color:#3498db;
            }
            .data{
                  float: right;
            }

          </style>

          <div class="head">
            <div class="form-group">
                <img id='blah' style="height:180px;" src="img/blankavatar.png" alt="your image" class='img-responsive img-circle' />
            </div>
              <h1>CodeBool Software Company Ltd.</h1>
              <p>Ukil Para,Feni Bangladesh<p>
          </div>
          <div class="widget-content nopadding">
            <div class="span6">
              <table class="table table-bordered table-invoice">
                <tbody>
                  <tr>
                  <tr>
                    <td class="width30">Invoice ID:</td>
                    <td class="width70"><strong>TD-6546</strong></td>
                  </tr>
                  <tr>
                    <td>Issue Date:</td>
                    <td><strong>March 23, 2013</strong></td>
                  </tr>
                  <tr>
                    <td>Due Date:</td>
                    <td><strong>April 01, 2013</strong></td>
                  </tr>
                <td class="width30">Client Address:</td>
                  <td class="width70"><strong>Cliente Company name.</strong> <br>
                    501 Mafia Street., washington, <br>
                    NYNC 3654 <br>
                    Contact No: 123 456-7890 <br>
                    Email: youremail@companyname.com </td>
                     </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div class="container-fluid" id="list">
                <div class="row-fluid">
                      <div class="span12">
                        <div class="widget-box">
                          <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Item No</th>
                                  <th>Price</th>
                                  <th>Vat</th>
                                  <th>Discount</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="odd gradeX">
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>
                                  <input type="submit" class="btn btn-success" value="Option"/>
                                  </td>
                                </tr>
                                <tr class="even gradeC">
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td><input type="submit" class="btn btn-success" value="Option"/></td>
                                </tr>
                                <tr class="odd gradeA">
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>

                                  <td><input type="submit" class="btn btn-success" value="Option"/></td>
                                </tr>
                                <tr class="even gradeA">
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
                                  <td>Trident</td>
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
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
@stop
