function readURL(input) {
    if (input.files && input.files[0])
    {
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


$(document).ready(function()
{
    $("#print").click(function()
    {
        var w = window.open('/parents_report_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
    $("#password").unbind().keyup(function(){
        var pass=$(this).val().length;
        if(pass=="" || pass<9)
        {
            $("#msg").html("<font color='red'>Password Weak</font>");
        }
        else
        {
            $("#msg").html("<font color='green'>Password Strong</font>");
        }
    });
    $("#password_check").unbind().keyup(function(){
        var pass=$("#password").val();
        var chk=$(this).val();
        if(pass==chk)
        {

            $("#msg1").html("<font color='green'>Password Match</font>");
            $("#submit").attr('disabled',false);

        }
        else
        {
            $("#msg1").html("<font color='red'>Password Not Match</font>");
            $("#submit").attr('disabled',true);

        }
    });
});


$(document).ready(function() {
    $("#print").click(function () {
        var w = window.open('/parents_report_pdf');

        w.onload = function () {
            w.print();
        };

    });
});