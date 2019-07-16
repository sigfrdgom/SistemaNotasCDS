window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/docente/buscarDocente/";

function listener(){
    document.getElementById('busqueda').addEventListener('keyup', buscarDocentes );
}

function buscarDocentes() {
    var busqueda = this.value;

    var request = new XMLHttpRequest();
    request.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('#tbody-table').innerHTML=this.responseText;
        }
    };
    request.open('POST', url);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('busqueda=' + busqueda );
}