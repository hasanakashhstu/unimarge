function readURL(input) {
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            $('#blah')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}




$(document).ready(function()
{
    $("#print").click(function()
    {
        var w = window.open('/applicant_student_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});


$(document).ready(function()
{

    $(".manage_class").unbind().change(function()
    {

        var class_name=$("#manage_class").val();
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