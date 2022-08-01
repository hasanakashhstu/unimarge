$(document).ready(function()
{
    $("#print").click(function()
    {
        var w = window.open('/create_role_pdf_report');

        w.onload = function()
        {
            w.print();
        };

    });
});