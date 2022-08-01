<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
<table style="border-collapse:separate;width:100%;background-color:#f3f3f3" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
        <td style="font-family:sans-serif;font-size:14px;vertical-align:top">&nbsp;</td>
        <td style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;Margin:0 auto;max-width:620px;padding:10px;width:620px">
            <div style="display:block;Margin:0 auto;max-width:620px;padding:10px">

                <div style="clear:both;Margin-bottom:10px;text-align:left;width:100%">
                    <table style="border-collapse:separate;width:100%;background-color:rgb(160,25,22);background-repeat:repeat;background-image:none;background-size:auto;border-radius:1px">
                        <tbody>
                        <tr>
                            <td style="font-family:sans-serif;font-size:14px;vertical-align:top;padding:10px 20px 15px 20px">
                                <table style="border-collapse:separate;width:100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="font-family:sans-serif;font-size:14px;vertical-align:top;color:#ffffff">
                                            <p style="font-family:sans-serif;font-size:22px;font-weight:bold;margin:0;Margin-bottom:2px">{{$class->topic}}</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <table style="border-collapse:separate;width:100%;background-color:rgb(255,255,255);background-repeat:repeat;background-image:none;background-size:auto;border-radius:1px">

                    <tbody>
                    <tr>
                        <td style="font-family:sans-serif;font-size:14px;vertical-align:top;padding:20px">
                            <table style="border-collapse:separate;width:100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>
                                    <td style="font-family:sans-serif;font-size:14px;vertical-align:top">
                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">Dear&nbsp;<span>{{(isset($is_teacher)&&$is_teacher)?$teacher_name:'Student'}},&nbsp;</span></p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">
                                            <span>Kindly note that, you have a online class on {{$class->topic}}, that will take place from
                                                <b>
                                                <span style="color:#0000ff">from {{date('h:i:A', strtotime($class->start_time))}} to {{date('h:i:A', strtotime($class->end_time))}}
                                                </span>
                                                </b>
                                            </span>
                                        </p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">
                                            <span style="color:#0000ff">
                                                <b>Date:</b>
                                                </span>{{date('d-m-Y', strtotime($class->start_time))}}</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">
                                            <span style="color:#0000ff"><b>Time:</b>
                                            </span> {{date('h:i:A', strtotime($class->start_time))}} - {{date('h:i:A', strtotime($class->end_time))}}</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px"><span style="color:#0000ff"><b>Class Number:</b>
														</span>{{$class->meeting_id}}</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px"><span style="color:#0000ff"><b>Teacher:</b>
														</span>{{$teacher_name}}</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">Thank you so much.</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">Best Regards,</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">{{Auth::user()->name}}</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">---</p>

                                        <p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;margin-bottom:15px;line-height:140%;line-height:20px">When it is time, <a target="_blank" href="{{(isset($is_teacher)&&$is_teacher)?url('live_class'):url('open_live_class/'.$class->id)}}">click on this link to join the class</a> .
                                        </p>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <div style="clear:both;Margin-top:10px;text-align:center;width:100%">
                    <table style="border-collapse:separate;width:100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                        <tr>
                            <td style="font-family:sans-serif;vertical-align:top;padding-bottom:10px;padding-top:10px;font-size:12px;color:#999999;text-align:center"><a href="http://tisibogra.com/" style="text-decoration-line:underline;text-decoration-style:solid;text-decoration-color:currentcolor;color:rgb(153,153,153);font-size:12px;text-align:center" rel="nofollow" target="_blank">{{Session::get('school.system_name')}}</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <font color="#888888"></font>
                </div>
                <font color="#888888"></font>
            </div>
        </td>
        <td style="font-family:sans-serif;font-size:14px;vertical-align:top">&nbsp;</td>
    </tr>
    </tbody>
</table>
</body>

</html>