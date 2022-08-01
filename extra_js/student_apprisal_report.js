
$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/student_apprisal_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});