$(document).ready(function(){
    $("#type").unbind().change(function(){
        var type=$(this).val();
        if(type=='Testimonial')
        {
            $("#text").show(500);
            $("#text2").hide(500);
        }
        else
        {
            $("#text2").show(500);
            $("#text").hide(500);
        }
    });
});

function printDiv()
{
    var divToPrint=document.getElementById('print-preview');
    var newWin=window.open('','Print-Window');
    newWin.document.open();
    newWin.document.write('<html> <style type="text/css">@font-face { font-family: Barcode; font-weight: bold; src: url("font-awesome/barcode/BarcodeFont.ttf")}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
    newWin.document.close();
}