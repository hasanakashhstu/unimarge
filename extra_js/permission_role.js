
$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/role_based_permission_pdf_report');

        w.onload = function()
        {
            w.print();
        };

    });
});