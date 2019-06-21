window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/notas/buscarNotas/";

function listener(){
    document.getElementById('busqueda').addEventListener('keyup', buscarNotas );
}

function buscarNotas() {
    var busqueda = this.value;
    var id_curso = this.getAttribute('data-id-curso');
    var id_modulo = this.getAttribute('data-id-modulo');

    var request = new XMLHttpRequest();
    request.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('contenido').innerHTML=this.responseText;
        }
    };
    request.open('POST', url);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id_curso=' + id_curso + '&id_modulo=' + id_modulo + '&busqueda=' + busqueda );
}
