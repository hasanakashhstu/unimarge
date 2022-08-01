
$(document).ready(function(){

    $('.class_delete').unbind().click(function(){
        var x =confirm("Are You Sure You want To Delete ?");
        if(x)
        {
            var id = $(this).attr('value');
            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl+'/manage_department/'+id+'',
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

        var w = window.open('/manage_department_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});


