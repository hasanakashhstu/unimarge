$(document).ready(function(){

    $('.class_delete').unbind().click(function(){
        var x = confirm("Are you sure you want to delete?");
        if (x)
        {
            var id = $(this).attr('value');

            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl+'/manage_section/'+id+'',
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
});
$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/manage_section_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});
