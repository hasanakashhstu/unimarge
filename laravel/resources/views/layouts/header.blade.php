<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title>@yield('Title')</title> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>University ERP</title>
    <link rel="icon" type="image/gif" href="{{ URL::asset('img/HS LOGO.png') }}" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property="og:image" content="{{ URL::asset('img/logo.png') }}">
    <meta property="og:image" content="/img/logo.png" />

    <meta property="og:image" content="{{ URL::asset('/img/logo.png') }}">
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>

    @include('layouts.css_link')

    @stack('styles')

    <style>
        div.controls input,
        textarea,
        select {
            width: 98%;
        }

    </style>

    @livewireStyles

    @stack('styles')
</head>


<body>
    <!--Header-part-->
    <div id="header">
        <!--  <h1><a href="/">School Management Admin</a></h1> -->
        <img src="{{ asset('img/logo.png') }}" style="height: 157%;
    margin-left: 12px;
    margin-top: 1%;
    width: 188px;" />
        <h3 style="margin-top: 0%;font-size: 8px;color: white;margin-left: 1.5%;">
            {{ Session::get('school.system_name') }}</h3>
    </div>
    <!--close-Header-part-->
