window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/modulo/buscarModulos/";

function listener(){
    document.getElementById('busqueda').addEventListener('keyup', buscarModulos );
}

function buscarModulos() {
    var busqueda = this.value;
    var id_tipo = this.getAttribute('data-id-tipo');

    var request = new XMLHttpRequest();
    request.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('contenido').innerHTML=this.responseText;
        }
    };
    request.open('POST', url);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('busqueda=' + busqueda + '&tipo=' + id_tipo );
}