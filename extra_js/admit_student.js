function readURL(input) {


    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }


}

function password_len_check()
{
    var password_length_for_password=$("#password").val().length;

    if(password_length_for_password < 8)
    {
        $("#help_block").html("<font color='red'>password weak</font>");
    }
    else
    {
        $("#help_block").html("<font color='green'>password strong</font>");
    }

}

$(document).ready(function(){
    $("#password_show_button").mouseup(function(){

        $("#password").attr("type", "password");
    });
    $("#password_show_button").mousedown(function(){
        $("#password").attr("type", "text");

    });
});


function Password_match()
{
    var password_get=$("#password").val();
    var confiram_password_get=$("#password_confirm").val();
    if(password_get==confiram_password_get)
    {
        $("#password_match").html("<font color='green'>password Match</font>");
        $("#submit_button").attr('disabled',false);
    }
    else
    {
        $("#password_match").html("<font color='red'>password Not Match</font>");
        $("#submit_button").attr('disabled',true);
    }
}

$(document).ready(function()
{

    $(".manage_class").unbind().change(function()
    {

        var class_name=$("#manage_class").val();

        // var class_name=$("#class_name").val();
        // var department=$("#department_name").val()
        // var session=$("#session").val();

        $.ajax({
                url: baseUrl+'/class_w_section_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){

                $('#student_section').html(data);
            }
        });

        $.ajax({
                url: baseUrl+'/class_w_department_filter',
            type: "post",
            data: {'class_name':class_name,'_token': $('input[name=_token]').val()},
            success: function(data){

                $('#Manage_department').html(data);
            }
        });

    });
});