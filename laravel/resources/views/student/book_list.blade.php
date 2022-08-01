@extends('student.master_template')
@section('dashboard_title','Book List')
@section('breadcrumbs','Book List')
@section('student_dasboard_content')

<style>
      .container {
      position: relative;
      width: 50%;
      }

      .image {
      display: block;
      width: 200px;
      height: 200px;
      }

      .container:hover .overlay {
      opacity: 1;
      }
</style>
<div class="row">
<div class="span3">
    <img src="img/book.png" alt="Avatar"  class="image">
    <div class="overlay">
      <div class="text">Hello World</div>
    </div>
</div>
<div class="span3">
  <img src="img/book.png" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Hello World</div>
  </div>
</div>
<div class="span3">
  <img src="img/book.png" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">Hello World</div>
  </div>
</div>
</div>
@stop
