
$(document).ready(function(){

$("#medium").unbind().change(function(){
    $(".medium_in_view").html($(this).val());
});




    $('#class_info').unbind().change(function(){
        var class_name=$('#class_info').val();
        $.ajax({
                url: baseUrl+'/class_w_department_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
                $('#Department_info').html(data);
            }
        });


        $.ajax({
                url: baseUrl+'/class_w_section_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
                $('#section_info').html(data);
            }
        });

    });
   
    $("#Department_info").unbind().change(function(){


        var class_name=$("#class_info").val();
         var Department_info=$(this).val();
         var section=$("#section_info").val();
  
         $.ajax({
            url:'/department_wise_subject',
            type:'post',
           data:{'class_name':class_name,'section':section,'Department_info':Department_info,'_token': $('input[name=_token]').val()},
           success:function(r){
            console.log(r);

            for(var i=0;i<=r.length;i++)
            {
                $("#subject_info").append("<option>"+r[i].subject_name+"</option>");
            }

           }


         });
    });



    $("#subject_info").unbind().change(function(){
        var default_session=$("#default_session").val();

        var section=$("#section_info").val();
        var Department_info=$("#Department_info").val();
        var class_name=$("#class_info").val();
        var medium=$("#medium").val();
        var subject=$("#subject_info").val();
        var date=$("#datepicker").val();
        $("#table_show_trigger_forsubject").show(500);


        $('.class_name_in_view').text(class_name);
        $('.section_name_in_view').text(section);
        $('.department_name_in_view').text(Department_info);
        $('.subject_name_in_view').text(subject);
        $('.date_in_view').text(date);
        //$('.subject_name_in_view').text(subject);


        $.ajax({
            url:'/attendance_student',
            type:"post",
            data:{'medium':medium,'class_name':class_name,'subject':subject,'section':section,'Department_info':Department_info,'default_session':default_session,'_token': $('input[name=_token]').val()},
            success:function(r)
            {
                //console.log(r);
                $("#student_data").html("");
                for(i=0;i<r.length;i++)
                {
                    $("#student_data").append("<tr>\
                        <td>"+r[i].roll+"</td>\
                        <td>"+r[i].student_name+"</td>\
                        <td><input type=\"checkbox\" class='status' value="+r[i].roll+" name=\"status[]\"></td>\
                      </tr>");
                }
            }
        });

    });

    $(".present").unbind().click(function(){
        $(".status").attr('checked','checked');
    });
    $(".absent").unbind().click(function(){
        $(".status").removeAttr('checked');
    });





});


function pop_print(){
    w=window.open(null, 'Print_Page', 'scrollbars=yes');
    w.document.write("<span><?php echo Session::get('school.system_name')?></span></br>");
    w.document.write("<span><?php echo Session::get('school.school_eiin')?></span></br>");
    w.document.write("<span><?php echo Session::get('school.address')?></span></br>");
    w.document.write("<span><?php echo Session::get('school.Phone')?></span></br>");
    w.document.write("<span><?php echo Session::get('school.Phone')?></span></br>");
    w.document.write("<span><?php echo Session::get('school.postal_code')?></span>");
    w.document.write(jQuery('.student_attendence_data').html());
    w.document.write('<style>@page{size:landscape;}</style><html><head><title></title>');
    w.document.write("<link href='/css/bootstrap.min.css'>");
    w.document.close();
    w.print();
}




$(document).ready(function(){

    $('#class_info').unbind().change(function(){
        var class_name=$('#class_info').val();
        $.ajax({
                url: baseUrl+'/class_w_department_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
                $('#Department_info').html(data);
            }
        });


        $.ajax({
                url: baseUrl+'/class_w_section_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){
                $('#section_info').html(data);
            }
        });

    });



    $("#to_date").unbind().mouseleave(function(){

        var subject=$("#subject_info").val();
        var section=$("#section_info").val();
        var Department_info=$("#Department_info").val();
        var class_name=$("#class_info").val();
        var from_date_info=$("#from_date").val();
        var  to_date_info=$("#to_date").val();
        var default_session=$("#default_session").val();
        var medium=$("#medium").val();
        //alert(medium);
          $('#loader').show();
        $('#data_show_tbl').show();
      

        $("#table_show_trigger_forattendance").show(500);
        $('.class_name_in_view').text(class_name);
        $('.section_name_in_view').text(section);
        $('.department_name_in_view').text(Department_info);
        $('.subject_name_in_view').text(subject);
        $('.from_date_view').text(from_date_info);
        $('.to_date_view').text(to_date_info);
        $('.default_session_data').text(default_session);

        $("#registered_participants").show(500);

        $.ajax({
            url:'/show_attendance_data',
            type:"post",
            data:{'medium':medium,'class_name':class_name,'subject':subject,'section':section,'Department_info':Department_info,'from_date_info':from_date_info,'to_date_info':to_date_info,'default_session':default_session,'_token': $('input[name=_token]').val()},
            success:function(data)
            {
                $('.student_attendence_data').html(data);

            }
        });
           $.ajax({
            url:'/report_of_attendance',
            type:"post",
            data:{'medium':medium,'class_name':class_name,'section':section,'Department_info':Department_info,'from_date_info':from_date_info,'to_date_info':to_date_info,'default_session':default_session,'_token': $('input[name=_token]').val()},
            success:function(r)
            {
                $('.student_attendence_data_table').html(r);
                $('#loader').hide();

            }
        });

    });


});