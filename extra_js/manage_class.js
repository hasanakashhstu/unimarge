
$(document).ready(function(){



    $('.class_delete').unbind().click(function(){
        var x = confirm("Are you sure you want to delete?");
        if (x)
        {
            var id = $(this).attr('value');
            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl+'/manage_class/'+id+'',
                type: "DELETE",
                data: {'id':id,'_token': $('input[name=_token]').val()},
                success: function(data){
                }
            });
        }
        else
        {
            return false;
        }

    });


    $("#print").click(function()
    {

        var w = window.open('/manage_class_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});
$(document).ready(function()
{

    $("#class_name").unbind().keyup(function()
    {

        var class_name=$("#class_name").val();
        // alert(class_name);
        $.ajax({
            url:'/class_data_check',
            type:"post",
            data:{'class_name':class_name,'_token': $('input[name=_token]').val()},
            success:function(data)
            {

                if(data)
                {
                    $('#check').html("<font color='red'>This class already exit</font>");
                    $("#submit").attr("disabled","disabled");
                }
                else
                {
                    $('#check').html("<font color='green'>Fill class nemaric number</font>");
                    $("#submit").prop('disabled', false);
                }
            }


        });
    });



});

$(document).ready(function(){

    $("#print").click(function()
    {

        var w = window.open('/manage_class_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});
