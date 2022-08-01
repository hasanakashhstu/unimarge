
$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/user_access_export');

        w.onload = function()
        {
            w.print();
        };

    });
});