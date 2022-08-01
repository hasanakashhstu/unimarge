
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID


    var x = $('.current_max_field').val(); //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append("<tr><td><input id='a_table'  type='text' name='kra[]' ></td><td><input id='a_table' type='text' name='weightage[]' weightage='"+x+"'  class='hundered_validation_check check_"+x+"' ></td><td><a href='#' class='remove_field_teacher_staff btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a></td><tr>"); //add input box
        }
        else
        {
            alert('Only 10 Fields Are Allowed')
        }
    });

    $(".input_fields_wrap").on('click','.remove_field_teacher_staff',function(){
        $(this).parent().parent().remove();
    });






    $(document).on("keyup", ".hundered_validation_check", function() {
        val=0;
        for(i=1;i<=x;i++)
        {

            var value = parseInt($(".check_"+i+"").val());

            val+=parseInt(value);
        }


        if(val==100)
        {
            $(".submit_button").attr("disabled",false);
        }
        else
        {
            $(".submit_button").attr("disabled",true);
        }
    });



});