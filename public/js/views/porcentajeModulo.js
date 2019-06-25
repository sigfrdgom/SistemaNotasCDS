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

    //alert(total);
    console.log(cont);
}