
$(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var max_student_id=0;
    var batch=0;
    var year=0;

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click


        function set_autoname()
        {

            var current_id=parseInt(max_student_id)+1;
            max_student_id=current_id;
            var current_id_convert_to_string=current_id.toString();
            var repeat_str_len=4-parseInt(current_id_convert_to_string.length);
            var repeat_string="0".repeat(repeat_str_len)+current_id_convert_to_string;

            var new_id=year+batch+repeat_string;

            $(".test").last().find('.b_s_roll').val(new_id);
        }


        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append("<div class='test'><input type='text' class='b_s_name' placeholder='Student Name' name='student_name[]'><input type='text' class='b_s_roll' disabled placeholder='Student Roll' name='roll[]'><input type='hidden' class='b_s_roll' placeholder='Student Roll' name='roll[]'><input type='text' class='b_s_reg' placeholder='Student Reg' name='reg_number[]'>&nbsp;<a href='#' style='margin-bottom: 2px;margin-top: 3px;'  class='remove_field btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a></div>"); //add input box
        }
        else
        {
            alert('Only 10 Fields Are Allowed')
        }



        if(max_student_id==0)
        {
            $.ajax({
                url: baseUrl+'/admit_bulk_student_autoname_genrate',
                type: "post",
                data: {'_token': $('input[name=_token]').val()},
                success: function(data){

                    max_student_id=data.student_id;
                    year=data.current_year;
                    batch=data.default_batch.default_batch;
                    set_autoname();
                }
            });
        }
        else
        {
            set_autoname();
        }




    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});


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