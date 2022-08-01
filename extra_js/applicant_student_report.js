$(document).ready(function(){



    $('.Admin_card').unbind().click(function(){
        var id = $(this).attr('aplicant_id');

        $.ajax({
                url: baseUrl+'/applicant_student_admit_card',
            type: "post",
            data: {'id':id,'_token': $('input[name=_token]').val()},
            success: function(data){
                $('#markshet').html(data);
            }
        });

    });




    $('.applicant_student_delete').unbind().click(function(){
        if( !confirm('Are you sure you want to continue?')) {
            return false;
        }else
        {
            var id = $(this).attr('value');
            $(this).closest('tr').remove();
            $.ajax({
                url: baseUrl+'/aplicant_student/'+id+'',
                type: "DELETE",
                data: {'id':id,'_token': $('input[name=_token]').val()},
                success: function(data){


                }
            });
        }


    });
});

function printDiv()
{

    var divToPrint=document.getElementById('print_div');

    var newWin=window.open('','Print-Window');

    newWin.document.open();

    newWin.document.write('<html> <style type="text/css">@font-face { font-family: Barcode; font-weight: bold; src: url("font-awesome/barcode/BarcodeFont.ttf")}</style><body onload="window.print()">'+divToPrint.innerHTML+'<br><br>\
<br></br></br>\
          <table >\
          <tr>\
              <td ><p style="border-top:black 1px solid">Authorized Signurature</p> </td>\
              <td ></td>\
              <td ></td>\
              <td ></td>\
              <td ><p style="border-top:black 1px solid">Student Signurature </p></td>\
          <tr>\
\
          </table>\
<br></br></br><br>\
          <p style="text-align:center">Software Provide By : TMSS ICT LTD.<br>\
          website : https://tmss-ict.com/<br>\
          Contact No :880-2-55073530<p>\
          </body></html>');

    newWin.document.close();



}


$(document).ready(function()
{
    $("#print").click(function()
    {

        var w = window.open('/applicant_student_pdf');

        w.onload = function()
        {
            w.print();
        };

    });
});