// Lo se. pero en este caso es para volver dinamico el ingreso de los modulos, falta validacion con ajax para el ingreso
moduloEval(1);

function moduloEval(numero) {
    moduloEvalHidden();
    for (let index = 1; index <= numero; index++) {
        document.getElementById("me"+index).style.display= 'block';
        document.getElementById("me"+index).value = ""
        document.getElementById("me"+index).placeholder = "Ingresa el porcentaje de la evaluacion " +index;
        document.getElementById("mel"+index).style.display= 'block'; 
    }
}

function moduloEvalHidden() {
    for (let index = 2; index <= 6 ; index++) {
        document.getElementById("me"+index).style.display= 'none';
        document.getElementById("me"+index).value = "0.0";
        document.getElementById("mel"+index).style.display= 'none';
    }
}

function validarPorcentajes(){

    var prom=0;
    for (let index = 1; index <= 6 ; index++) {
        var x = document.forms["mod"]["me"+index].value;
        prom=prom+ parseInt(x);
    }

    if (prom != 100) {
        swal({
            title: "Alerta!",
            text: "La sumatoria de los porcentajes que has ingresado no son iguales a %100 por favor revisa",
            icon: "warning",
            button: "Entendido",
          });
        return false;
    }
}