@extends('admin.index')
@section('Title','Create Permission')
@section('breadcrumbs','Create Permission')
@section('breadcrumbs_link','/create_permission')
@section('breadcrumbs_title','create_permission')

@section('content')


<div class="container">
  <h2> Check Your Permission </h2><br>
  
  <div><h2>Note</h2>
<p title="Transport Details text-primary">You Can Not Change The Permit</p></div>

<h3 class='text-center'>Form Permission</h3>
<div class="tab-content">
  <table class="table table-striped">
    <thead>
      <tr class="larger_font_permission">
        <th>Access Form</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="Content Permission")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
     
    </tbody>
  </table>
</div>
</div>



<h3 class='text-center'>Module Permission</h3>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Access Form</th>
        <th>Description</th>
        <th> Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="MODULE")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
      
    </tbody>
  </table>
</div>



<h3 class='text-center'>Feature Permission</h3>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Access Form</th>
        <th>Description</th>
        <th> Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($permission_data as $permission_data_permission)
        @if($permission_data_permission->description=="Feature")
        <tr>
          <td> {{$permission_data_permission->display_name}}</td>
          <td> {{$permission_data_permission->description}}</td>
          <td> <button type="button" disabled class="btn btn-info">Edit</button></td>
          <td> <button type="button" disabled class="btn btn-danger">Delete</button></td>
          <td> <button type="button" disabled class="btn btn-success">Show</button></td>
        </tr>
        @endif
      @endforeach
      
    </tbody>
  </table>
</div>



@stop
