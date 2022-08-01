$(document).ready(function () {

    $("#promote_class").unbind().change(function () {

        //var current_department=$("#current_department").val();
        var current_class = $("#current_class").val();
        var promote_class = $("#promote_class").val();
        var current_session = $("#current_session").val();
//         var promote_session=$("#promote_session").val();
//          alert(current_class+promote_class+current_session);


        $.ajax({
            url: baseUrl + '/student_promoation',
            type: "post",
            data: {
                'current_class': current_class,
                'promote_class': promote_class,
                'current_session': current_session,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                //console.log(data);
                $('#manage_promotion').html(data);

            }
        });


    });

    $("#current_class").unbind().change(function () {
        var current_class = $(this).val();
        $.ajax({
            url: baseUrl + '/promotable_class',
            type: "post",
            data: {
                'current_class': current_class,
                '_token': $('input[name=_token]').val()
            },
            success: function (data) {
                //console.log(data);
                $('#promote_class').html('');
                $('#promote_class').html(data);

            }
        });


    });
});
