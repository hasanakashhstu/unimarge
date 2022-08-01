$(document).ready(function () {
    $('.applicant_student_delete').unbind().click(function () {
        var id = $(this).attr('value');
        if (confirm('Are you sure you want to delete this?')) {
            $(this).closest('tr').remove();

            $.ajax({
                url: baseUrl + '/exam_grade/' + id + '',
                type: "DELETE",
                data: {'id': id, '_token': $('input[name=_token]').val()},
                success: function (data) {


                }
            });
        }

    });
});

$(document).ready(function () {

    $('.marks').unbind().click(function () {
        alert("ok");
    });


    $('.Admin_card').unbind().click(function () {
        var id = $(this).attr('aplicant_id');

        $.ajax({
            url: baseUrl + '/applicant_student_admit_card',
            type: "post",
            data: {'id': id, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#markshet').html(data);
            }
        });

    });

    $('#class_info').unbind().change(function () {
        var class_name = $('#class_info').val();
        $.ajax({
            url: baseUrl + '/class_w_department_filter',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#Department_info').html(data);
            }
        });


        $.ajax({
            url: baseUrl + '/class_w_section_filter',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#section_info').html(data);
            }
        });

        $.ajax({
            url: baseUrl + '/class_w_subject_filter',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#subject_info').html(data);
            }
        });

    });


    function reverseString(str) {
        var newString = "";
        for (var i = str.length - 1; i >= 0; i--) {
            newString += str[i];
        }
        return newString;
    }


    $("#manage_mark_button").unbind().click(function () {
        var class_name = $("#class_info").val();
        var section_name = $("#section_info").val();
        var Department = $("#Department_info").val();
        var subject_name = $("#subject_info").val();
        var default_session = $("#default_session").val();
        var component = [];

        $(".student_data_show_on_thead").html('');
        $.ajax({
            url: baseUrl + '/manage_marks_for_student_find_component',
            type: "post",
            data: {
                'subject_name': subject_name,
                '_token': $('input[name=_token]').val()
            },
            success: function (subject_wise_component) {
                var colspan = subject_wise_component.length;
                $('.colspan_value_on_component').attr('colspan', colspan);

                for (i in subject_wise_component) {
                    $('.student_data_show_on_thead').append("<td>" + subject_wise_component[i].abbr + "</td>");
                }
            }
        });

        console.log(component);
        if (subject_name == "") {
            alert("Please Enter Subject Name");
        } else {
            $("#subject_name").text($("#subject_info option:selected").text());
            $("#manage_entry_section").show(1000);
            $(".student_data_show").html('');
            $.ajax({
                url: baseUrl + '/manage_marks_for_student',
                type: "post",
                data: {
                    'class_name': class_name,
                    'section_name': section_name,
                    'Department': Department,
                    'default_session': default_session,
                    '_token': $('input[name=_token]').val()
                },
                success: function (data) {
                    console.log(data);

                    $('#max_min_mark').html(data[0] + "-" + data[1]);
                    $('#total_student').html(data[3]);
                    //console.log(data[2]);


                    for (var i = 0; i < data[2].length; i++) {


                        var sl_no = parseInt(i) + 1;
                        var e_v = data[2][i];
                        $.ajax({
                            url: baseUrl + '/manage_marks_for_student_find_component',
                            type: "post",
                            test: e_v,
                            data: {
                                'subject_name': subject_name,
                                '_token': $('input[name=_token]').val()
                            },
                            success: function (subject_wise_component) {
                                console.log(this.test);
                                //console.log(subject_wise_component);
                                var colspan = subject_wise_component.length;
                                $('.colspan_value_on_component').attr('colspan', colspan);


                                //Manage Mark First Part Here
                                var desgin1 = "<tr>" +
                                    "<td>" + sl_no + "</td>" +
                                    "<td>" + this.test.student_name + "</td>" +
                                    "<td><input style='width:100px' readonly='readonly'  value=" + this.test.roll + " type='text'><input style='width:100px'  value=" + this.test.roll + " class='student_roll' name='student_roll' type='hidden'><input style='width:100px' ' value=" + this.test.roll + " name='roll[]' type='hidden'></td>";


                                //Manage Mark Sceond Part Here
                                var desgin2 = '';
                                for (j in subject_wise_component) {

                                    desgin2 += "<td>" +
                                        "<input style='width:50px' class='component_id' id=" + subject_wise_component[j].component_id + " name='component_id[]' value=" + subject_wise_component[j].component_id + " type='hidden'>" +
                                        "<input style='width:50px' class='component_name' name='component_name[]' value=" + subject_wise_component[j].component_name + " type='hidden'>" +
                                        "<input style='width:50px' class='all_component_id' id=" + subject_wise_component[j].component_id + " name='all_component_id' value=" + subject_wise_component[j].component_id + " type='hidden'><input style='width:50px' class='all_component_name' name='all_component_name' value=" + subject_wise_component[j].component_name + " type='hidden'>" +
                                        "<input style='width:50px' id=" + subject_wise_component[j].component_name + " class='mark_j' name='mark[]' type='text'> </td>";
                                }


                                //Manage Mark Third Part Here
                                var desgin3 = "<td><input style='width:100px' class='cgpa' name='cgpa[]' readonly='readonly' type='text'></td>" +
                                    "<td><input style='width:100px' class='grade_name' name='grade_name[]' readonly='readonly' type='text'></td>" +
                                    "<td><input style='width:100px' value='N/A' type='text' class='comment' name='comment[]'></td></tr>";
                                var desgin = desgin1 + desgin2 + desgin3;
                                $('.student_data_show').append(desgin);
                                desgin = '';
                                desgin1 = '';
                                desgin2 = '';
                                desgin3 = '';

                            }
                        });


                    }


                }
            });


        }

    });

    $("#manage_mark_edit_button").unbind().click(function () {
        var class_name = $("#class_info").val();
        var section_name = $("#section_info").val();
        var Department = $("#Department_info").val();
        var subject_name = $("#subject_info").val();
        var exam_name = $("#exam_info").val();

        var default_session = $("#default_session").val();
        var component = [];
        if (subject_name == "") {
            alert("Please Enter Subject Name");
        } else {

            $.ajax({
                url: baseUrl + '/edit_marks_for_student_find_component',
                type: "post",
                data: {
                    'class_name': class_name,
                    'section_name': section_name,
                    'Department': Department,
                    'exam_name': exam_name,
                    'subject_name': subject_name,
                    'default_session': default_session,
                    '_token': $('input[name=_token]').val()
                },
                success: function (data) {
                    var data_length = data.length;
                    console.log(data_length);
                    $(".edit_table").html(data);
                    $("#edit_button").show();
                }
            });


        }

    });


    $('.edit_table').on('keyup', '.mark_j', function (eq) {
        var row = $(this).closest("tr");
        var pass_mark = $(this).val();
        var component_id = $(this).closest("td").find("input[name='all_component_id']").val();
        var subject_info = $("#subject_info").val();
        var student_roll = $(this).closest("tr").find("input[name='student_roll']").val();

        var component_name = $(this).closest("td").find("input[name='all_component_name']").val();
        var exam_name = $("#exam_info").val();

        $.ajax({
            url: "/grade_and_cgp_find",
            type: "post",
            data: {
                'pass_mark': pass_mark,
                'student_roll': student_roll,
                'exam_name': exam_name,
                'subject_info': subject_info,
                'component_id': component_id,
                'component_name': component_name,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                console.log(data);

                var data_length = data.length;
                console.log(data);
                if (data_length > 2) {
                    swal('Error!', 'Subject Mark Is Must Be Less Then Subject Total Mark', 'error');
                    $("#submit_button_for_edit").attr('disabled', 'disabled');


                } else {

                    $("#submit_button_for_edit").removeAttr('disabled');
                    row.find(".cgpa").val(data[0]);
                    row.find(".grade_name").val(data[1]);

                }


            }
        });


    });


    $('#registered_participants').on('keyup', '.mark_j', function (eq) {
        var row = $(this).closest("tr");
        var pass_mark = $(this).val();
        var component_id = $(this).closest("td").find("input[name='all_component_id']").val();
        var subject_info = $("#subject_info").val();
        var student_roll = $(this).closest("tr").find("input[name='student_roll']").val();

        var component_name = $(this).closest("td").find("input[name='all_component_name']").val();
        var exam_name = $("#exam_info").val();

        $.ajax({
            url: "/grade_and_cgp_find",
            type: "post",
            data: {
                'pass_mark': pass_mark,
                'student_roll': student_roll,
                'exam_name': exam_name,
                'subject_info': subject_info,
                'component_id': component_id,
                'component_name': component_name,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {

                console.log(data);
                var data_length = data.length;
                // console.log(data);
                if (data_length > 2) {
                    swal('Error!', 'Subject Mark Is Must Be Less Then Subject Total Mark', 'error');
                    $("#submit_button").attr('disabled', 'disabled');


                } else {

                    $("#submit_button").removeAttr('disabled');
                    row.find(".cgpa").val(data[0]);
                    row.find(".grade_name").val(data[1]);

                }


            }
        });


    });


});


$(document).ready(function () {

    $('#class_info').unbind().change(function () {
        var class_name = $('#class_info').val();
        $.ajax({
            url: baseUrl + '/class_w_department_filter',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#Department_info').html(data);
            }
        });


        $.ajax({
            url: baseUrl + '/class_w_section_filter',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#section_info').html(data);
            }
        });

        $.ajax({
            url: baseUrl + '/class_w_subject_filter_another',
            type: "post",
            data: {'class_name': class_name, '_token': $('input[name=_token]').val()},
            success: function (data) {
                $('#subject_info').html(data);
            }
        });

    });
    $("#section_info").unbind().change(function () {
        var section = $("#section_info").val();

    });
    $("#Department_info").unbind().change(function () {
        var department = $("#Department_info").val();

    });


    $("#serach_btn_publish").unbind().click(function () {
        var subject = $("#subject_info").val();
        var exam_name = $("#exam_name").val();
        var section = $("#section_info").val();
        var Department_info = $("#Department_info").val();
        var class_name = $("#class_info").val();
        var default_session = $("#default_session").val();

        // $("#table_show_search_info").show(500);
        // $('#exam_name_view').text(exam_name);
        // $('#class_name_view').text(class_name);
        // $('#section_name_view').text(section);
        // $('#department_name_view').text(Department_info);
        // $('#subject_name_view').text(subject);
        // $('#default_session_view').text(default_session);
        // $('html,body').css('cursor', 'wait');
        // $("html").css({'background-color': 'black', 'opacity': '0.5'});
        // $("body").css('pointer-events', 'none');
        $("#show_publish_marks_view").html('');
        $.ajax({
            url: '/publish_marks_get',
            type: "post",
            data: {
                'class_name': class_name,
                'subject': subject,
                'exam_name': exam_name,
                'section': section,
                'Department_info': Department_info,
                'default_session': default_session,
                '_token': $('input[name=_token]').val()
            },
            success: function (r) {
                $("#show_publish_marks_view").html(r);
                $("html").css({'background-color': '', 'opacity': ''});
                $("body").css('pointer-events', '');
                console.log(r);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // $("html").css({'background-color': '', 'opacity': ''});
                // $("body").css('pointer-events', '');
                toastr.error('Try Again Later');
                //$('html,body').css('cursor', 'default');
            }
        });
    });


    $("#serach_btn_for_marksheet").unbind().click(function () {
        var class_name = $("#class_info").val();
        var Department = $("#Department_info").val();
        var exam_name = $("#exam_info").val();
        var section_name = $("#section_info").val();
        var student_roll = $("#student_roll").val();

        $.ajax({
            url: baseUrl + '/marksheet_report_publish',
            type: "post",
            data: {
                'class_name': class_name,
                'Department': Department,
                'exam_name': exam_name,
                'section_name': section_name,
                'student_roll': student_roll,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                
                if (data.length == 9) {
                    $("#not_found_view").show();
                    $("#not_publish_view").hide();

                    $("#print_btn_disable").hide();
                } else if (data.length == 15) {
                    $("#not_publish_view").show();
                    $("#not_found_view").hide();
                    $("#print_btn_disable").hide();
                } else {
                    $("#not_found_view").hide();
                    $("#not_publish_view").hide();
                    $("#marksheet_view").html(data);
                    $("#print_btn_disable").show();
                }


            }
        });


    });


    $("#subject_info, #default_session").unbind().change(function () {
        var subject = $("#subject_info").val();
        var exam_name = $("#exam_name").val();
        var section = $("#section_info").val();
        var Department_info = $("#Department_info").val();
        var class_name = $("#class_info").val();
        var default_session = $("#default_session").val();

        $("#table_show_trigger_forsubject").show(500);

        $('.exam_name_in_view').text(exam_name);
        $('.class_name_in_view').text(class_name);
        $('.section_name_in_view').text(section);
        $('.department_name_in_view').text(Department_info);
        $('.subject_name_in_view').text(subject);


        $.ajax({
            url: '/check_marks_edit',
            type: "post",
            data: {
                'class_name': class_name,
                'subject': subject,
                'exam_name': exam_name,
                'section': section,
                'Department_info': Department_info,
                'default_session': default_session,
                '_token': $('input[name=_token]').val()
            },
            success: function (r) {
                $("#edit_mark_data").html("");
                for (i = 0; i < r.length; i++) {
                    $("#edit_mark_data").append("<tr>\
                        <td>" + r[i].subject + "</td>\
                        <td>" + r[i].roll + "</td>\
                        <td class='cgpa'>" + r[i].cgpa + "</td>\
                        <td class='grade_name'>" + r[i].grade_name + "</td>\
                        <td><input type='text' class='mark_data' get_value=" + r[i].roll + " id='mark_data' value=" + r[i].mark + "></td>\
                        @permission('DELETE')\
                        <td><input type=\"button\" class=\"btn btn-danger delete\" id=\"delete\" get_value_delete=" + r[i].roll + " value=\"Delete\"></td>@endpermission\
                      </tr>");
                }

            }
        });

    });

    $('#report').on('keyup', '.mark_data', function (eq) {
        var row = $(this).closest("tr");
        var mark = $(this).val();
        var roll = $(this).attr('get_value');
        $.ajax({
            url: '/update_mark',
            type: 'post',
            data: {'mark': mark, 'roll': roll, '_token': $('input[name=_token]').val()},
            success: function (data) {
                row.find(".cgpa").html(data[0]);
                row.find(".grade_name").html(data[1]);
            }

        });


    });

    $('#report').on('click', '.delete', function (eq) {
        if (!confirm('Are you sure you want to continue?')) {
            return false;
        } else {
            var id = $(this).attr('get_value_delete');
            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl + '/check_marks_delete/' + id + '',
                type: "post",
                data: {'id': id, '_token': $('input[name=_token]').val()},
                success: function (data) {

                }
            });
        }


    });


});

$(document).ready(function () {
    $(".tabulation_sheet").unbind().click(function () {
        var class_name = $("#class_name").val();
        var exam_name = $("#exam_name").val();
        var session = $("#session").val();
        $.ajax({
            url: '/tabulation_data_get',
            type: 'post',
            data: {
                'class_name': class_name,
                'exam_name': exam_name,
                'session': session,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                // console.log(data);
                $("#tabulation_sheet_report").html(data);
            }
        });
    });
});

function pop_print() {
    w = window.open(null, 'Print_Page', 'scrollbars=yes');
    w.document.write(jQuery('#tabulation_sheet_report').html());
    w.document.write('<style>@page{size:landscape;}</style><html><head><title></title>');
    w.document.write("<link href='/css/bootstrap.min.css'>");
    w.document.close();
    w.print();
}

function readURL(input) {
    if (input.files && input.files[0]) {
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

$(document).ready(function () {


    $('.qstn').click(function () {
        $('#close').show();
        var id = $(this).attr('value');
        var omyFrame = document.getElementById("myFrame");
        omyFrame.style.display = "block";
        omyFrame.src = id;


    });

    $('#close').click(function () {
        $('#myFrame').hide();
        $('#close').hide();

    });
});

$(document).ready(function () {

    $(".file_jquery").unbind().click(function () {
        $("#myModal").show();
        var file_name = $(this).attr('file_title');
        var file_extesnsion = $(this).attr('file_extension');

        if (file_extesnsion == "pdf") {
            $("#file_div").html("<iframe src='img/backend/question_paper/" + file_name + "" + "." + "" + file_extesnsion + "' frameborder='0' style='width: 100%; height:450px'></iframe>");
        } else if (file_extesnsion == "doc" || file_extesnsion == "docx" || file_extesnsion == "odt") {
            $("#file_div").html(" <img src='img/word.png' style='margin-left: 35%;margin-top:10%;'>\
                    <br> <h3 align='center' style='color:red'>This Word File Only Download Possible</h3>");
        } else if (file_extesnsion == "xlsx" || file_extesnsion == "csv") {
            $("#file_div").html(" <img src='img/excel.png' style='margin-left: 35%;margin-top:10%;'>\
                    <br> <h3 align='center' style='color:red'>This Excel File Only Download Possible</h3>");
        } else {
            $("#file_div").html(" <img src='img/wrong_type.png' style='margin-left: 35%;margin-top:10%;'>\
                    <br> <h3 align='center' style='color:red'>This File Type is Wrong</h3>");
        }
    });


    $('.applicant_student_delete').unbind().click(function () {
        var id = $(this).attr('value');
        if (confirm('Are you sure you want to delete this?')) {
            $(this).closest('tr').remove();

            $.ajax({
                url: baseUrl + '/question_paper/' + id + '',
                type: "DELETE",
                data: {'id': id, '_token': $('input[name=_token]').val()},
                success: function (data) {
                }
            });
        }

    });


});