
$(document).ready(function() {
    $("#total_score").val("0");
    var total_score=0;
    // var max_fields      = 50; //maximum input boxes allowed
    // var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    // var add_button      = $(".add_field_button"); //Add button ID

    // var x = 1; //initlal text box count
    // $(add_button).click(function(e){ //on add input button click
    //     e.preventDefault();
    //     if(x < max_fields){ //max input box allowed
    //         x++; //text box increment
    //         $(wrapper).append("<tr><td><input id='a_table' type='text' name='goals[]'></td><td><input id='a_table' type='text' name='weightage[]'></td><td><input id='a_table' type='text' name='Score[]' ></td><td><input id='a_table' type='text' name='score_erand[]' ></td><td><a href='#' class='remove_field_teacher_staff btn btn-default'><i class='fa fa-trash' aria-hidden='true'></i></a></td><tr>"); //add input box
    //     }
    //     else
    //     {
    //     	alert('Only 10 Fields Are Allowed')
    //     }
    // });

    // $(".input_fields_wrap").on('click','.remove_field_teacher_staff',function(){
    //     $(this).parent().parent().remove();
    // });


    $(".apprisal_type").unbind().change(function()
    {

        var apprisal_type=$("#apprisal_type").val()



        $.ajax({
                url: baseUrl+'/student_apprisal/'+apprisal_type+'',
            type: "get",
            data: {'_token': $('input[name=_token]').val()},
            success: function(data){
                $("#apprisal_by").html(data);

            }
        });


    });

    $(".apprisal_template").unbind().change(function()
    {

        var template_name=$("#apprisal_template").val()

        $.ajax({
                url: baseUrl+'/student_apprisal/'+template_name+'/edit',
            type: "get",
            data: {'_token': $('input[name=_token]').val()},
            success: function(data){
                // $("#apprisal_by").html(data);

                $('#template_wise_tr').html(data);
            }
        });
    });




    $(document).on("keyup keydown", ".score", function() {

        var total_goal=$(".total_goal").val();



        var total=0;
        for(i=1;i<=total_goal;i++)
        {
            var score=$("#score_"+i).val();
            if (score)
            {

                total=total+parseInt(score);
            }


        }
        if(total<=100)
        {
            $("#total_score").val(total);
            $("#total_score_h").val(total);

        }
        else
        {
            $(this).val('');
            $("#total_score").val('');
            $("#total_score_h").val('');
            $("#over_100_message").html("<font color='red'>Total Score Calulate be 100 </font>")
        }

        // if(total_score<=100)
        // {
        //   $("#total_score").val(total_score);
        // }
        // else
        // {
        //   $(this).val("");
        // }



    });




    $(document).on("keyup keydown", "#converted", function() {

        var total=$("#total_score").val();
        if(total==0)
        {
            $("#total_score_message").html("<font color='red'>Total Score Must be grater then 0</font>");
            $("#converted").val('');
        }
        else
        {
            var total_on=$("#total_score").val();
            var calculate_on=$("#converted").val();

            var point=(total_on*calculate_on)/100;

            $('#convert_value_find').html(point);
            $('#out_of').html(calculate_on);
            $('#convert_value_find_text').val(point);
        }

    });





    $(document).on("keyup", ".apprisal_filter_id", function() {


        var student_roll=$(this).val();
        var apprisal_type=$("#apprisal_type").val()

        if(apprisal_type=="Student")
        {
            $.ajax({
                url: baseUrl+'/notice_board_student_data_get',
                type: "post",
                data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
                success: function(data){
                    console.log(data);


                    if(data)
                    {
                        $(".apprisal_by").html("<select id='apprisal_by' class='apprisal_by'><option>"+data.student_name+"</option></select>");
                    }



                    // $("#templete_wise_component").html("");
                    // templete_desgin(data.class);
                }
            });
        }
        else
        {

            $(".apprisal_by").attr("type","select");

        }

    });











});