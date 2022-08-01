
$(document).ready(function(){


    $('.admit_student_info_delete').unbind().click(function(){
        if( !confirm('Are you sure you want to continue?')) {
            return false;
        }else
        {

            var id = $(this).attr('value');

            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl+'/student_information/'+id+'',
                type: "DELETE",
                data: {'id':id,'_token': $('input[name=_token]').val()},
                success: function(data){


                }
            });
        }

    });
    $('#admit_student_info_print').unbind().click(function(){
        var roll= $(this).attr('get_value');
        //alert(roll);
        $.ajax({
                url: baseUrl+'/student_information_data'+roll,
            type: "get",
            success: function(data){
                $('#report').html(data);
                //console.log(data);
            }
        });

    });


});