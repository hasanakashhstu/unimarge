
$(document).ready(function(){
    $('.file_jquery').click(function(){
        var file_name = $(this).attr('file_title');
        var file_extesnsion = 'pdf';
        var link = $(this).attr('href');
        $("#file_div").html("<iframe src='"+link+"' frameborder='0' style='width: 100%; height:450px'></iframe>");
    });

    $('#close').click(function(){
        $('#myFrame').hide();
        $('#close').hide();

    });
});
$(document).ready(function(){
    $('.applicant_student_delete').unbind().click(function(){
        var id = $(this).attr('value');
        if (confirm('Are you sure you want to delete this?')) {
            $(this).closest('tr').remove();

            $.ajax({
                url: baseUrl+'/academic_syllabus/'+id+'',
                type: "DELETE",
                data: {'id':id,'_token': $('input[name=_token]').val()},
                success: function(data){


                }
            });
        }

    });
});
$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/academic_syllabus_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});
$(document).ready(function()
{

    $("#class_name").unbind().change(function()
    {

        var class_name=$("#class_name").val();

        $.ajax({
            url:'/class_wise_subject',
            type:"post",
            data:{'class_name':class_name,'_token': $('input[name=_token]').val()},
            success:function(data)
            {

                $("#subject").html(data);

            }


        });
    });



});

$(document).ready(function(){

    $('.class_delete').unbind().click(function(){
        var id = $(this).attr('value');

        $(this).closest('tr').remove();
        $.ajax({
                url: baseUrl+'/academic_syllabus/'+id+'',
            type: "DELETE",
            data: {'id':id,'_token': $('input[name=_token]').val()},
            success: function(data){

                console.log("ok");
            }
        });

    });
});
$(document).ready(function()
{

    $("#class_name").unbind().change(function()
    {

        var class_name=$("#class_name").val();

        $.ajax({
            url:'/class_wise_subject',
            type:"post",
            data:{'class_name':class_name,'_token': $('input[name=_token]').val()},
            success:function(data)
            {
                console.log(data);
                $("#subject").html(data);

            }


        });
    });



});

$(document).ready(function()
{

    $("#class_name").unbind().change(function()
    {

        var class_name=$("#class_name").val();

        $.ajax({
            url:'/class_wise_subject',
            type:"post",
            data:{'class_name':class_name,'_token': $('input[name=_token]').val()},
            success:function(data)
            {

                $("#subject").html(data);

            }


        });

         $.ajax({
            url:'/class_wise_department',
            type:"post",
            data:{'class_name':class_name,'_token': $('input[name=_token]').val()},
            success:function(data)
            {

                $("#department").html(data);

            }


        });
    });



});