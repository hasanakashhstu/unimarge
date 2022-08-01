<!DOCTYPE html>

<head>
    <title>Online Live Class</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.10/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.10/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/jquery.min.js"></script>
    <script src="https://source.zoom.us/1.7.10/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.7.10.min.js"></script>
    <script src="{{URL::asset('js/zoom_js/tool.js')}}"></script>
    <script src="{{URL::asset('js/zoom_js/vconsole.min.js')}}"></script>
    <script>
        var baseUrl = '{{url('/')}}';
        var meetingNumber = parseInt('{{$live_class->meeting_id}}');
        var API_KEY = '{{config('zoom.api_key')}}';
        var API_SECRET = '{{config('zoom.api_secret')}}';
        var role = '{{isset($role) ?  $role : 0}}'

        var meetingConfig = {
            apiKey: API_KEY,
            meetingNumber: meetingNumber,
            userName: '{{isset($role) && $role == 1 ? $student->name : $student->student_name}}',
            passWord: "123456",
            leaveUrl: '{{isset($leave_url) ? $leave_url : ""}}',
            role: role,
            userEmail: '{{(filter_var($student->email, FILTER_VALIDATE_EMAIL))?$student->email:""}}',
            lang: 'en-US',
            signature: "",
            china: false,
        };

        var signature = ZoomMtg.generateSignature({
            meetingNumber: meetingNumber,
            apiKey: API_KEY,
            apiSecret: API_SECRET,
            role: role,
            success: function (res) {
              console.log(res.result);
              meetingConfig.signature = res.result;
            },
        });
    </script>
    <script src="{{URL::asset('js/zoom_js/meeting.js')}}"></script>
</body>

</html>