$(document).ready(function()
{

    $(".medium").unbind().change(function()
    {

        var addmission_test=$("#addmission_test").val()
        var class_name=$("#class_name").val();
        var department=$("#department_name").val()
        var session=$("#session").val();
        var shift=$("#shift").val();
        var batch=$("#batch").val();
        var medium=$(".medium").val();
        
        $.ajax({
                url: baseUrl+'/admission_test_student',
            type: "post",
            data: {'shift':shift,'batch':batch,'addmission_test':addmission_test,'class_name':class_name,'department':department,'session':session,'medium':medium,'_token': $('input[name=_token]').val()},
            success: function(data){
                console.log(data);
                $('#addmission_test_student').html(data);
            }
        });
    });



});