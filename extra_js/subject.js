$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/component_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});


$(document).ready(function(){

    $('.class_delete').unbind().click(function(){
        var id = $(this).attr('value');
        $(this).closest('tr').remove();
        $.ajax({
                url: baseUrl+'/manage_subject/'+id+'',
            type: "DELETE",
            data: {'id':id,'_token': $('input[name=_token]').val()},
            success: function(data){


            }
        });

    });
});