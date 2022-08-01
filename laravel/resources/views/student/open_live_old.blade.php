<!DOCTYPE html>
<head>
    <title>Zoom WebSDK</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.4/css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.4/css/react-select.css"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<style>
    body {
        padding-top: 50px;
    }
</style>

<nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Online Class</a>
        </div>
        <div id="navbar">
            <form class="navbar-form navbar-right" id="meeting_form">
                <button type="button" onclick="location.reload()" class="btn btn-primary" id="join_meeting">Join in Class</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<script src="https://source.zoom.us/1.7.4/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/jquery.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/lodash.min.js"></script>

<script src="https://source.zoom.us/zoom-meeting-1.7.4.min.js"></script>

<script>
    //var API_KEY = 'W0Asxcv8SKGkltfhFJROJQ';
    // var API_SECRET = 'qZMSWVRvRmFQJ6WKZY8KVfwsVhaU9iutNP0G';
    var baseUrl = '{{url('/')}}';

    var meetConfig = {
        apiKey: '{{config('zoom.api_key')}}',
        apiSecret: '{{config('zoom.api_secret')}}',
        meetingNumber: parseInt({{$live_class->meeting_id}}),
        userName: '{{isset($role) && $role == 1 ? $student->name : $student->student_name}}',
        passWord: "123456",
        leaveUrl: '{{isset($leave_url) ? $leave_url : ""}}',
        role: '{{isset($role) ?  $role : 0}}',
    };

</script>

<script src="{{URL::asset('js/zoom_js/tool.js')}}"></script>
<script src="{{URL::asset('js/zoom_js/index.js')}}"></script>

<script>

</script>
</body>
</html>
