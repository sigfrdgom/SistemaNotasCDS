$('#alert-error').hide();
$('#alert-warning').hide();
window.addEventListener('DOMContentLoaded', listener);

function listener() {
    //document.getElementsByClassName('porcentaje').addEventListener('keyup', sumar);
}

function sumar() {
    var total = 0;
    var cont=0;

    $(".porcentaje").each(function() {
        cont++;
        if (isNaN(parseFloat($(this).val()))) {
            total += 0;
        } else {
            total += parseFloat($(this).val());
        }
    });

    if(total> 100){
        $('#alert-error').show();
        document.getElementById('total_danger').innerHTML=total;
        console.log("La suma de los totales de swer 100");
    }else{
        $('#alert-error').hide();
    }
    if (total > 0 && total<100){
        $('#alert-warning').show();
        document.getElementById('total_warning').innerHTML=total;
    }else{
        $('#alert-warning').hide();
    }
}