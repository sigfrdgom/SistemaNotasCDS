window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/participante/buscarParticipante/";

function listener(){
    document.getElementById('busqueda').addEventListener('keyup', buscarParticipantes );
}

function buscarParticipantes() {
    var busqueda = this.value;

    var request = new XMLHttpRequest();
    request.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('contenido').innerHTML=this.responseText;
        }
    };
    request.open('POST', url);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('busqueda=' + busqueda );
}