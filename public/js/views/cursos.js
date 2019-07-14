window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/curso/buscarCursos/";

function listener(){
    document.getElementById('busqueda').addEventListener('keyup', buscarCursos );
}

function buscarCursos() {
    var busqueda = this.value;
    var id_curso = this.getAttribute('data-id-curso');

    var request = new XMLHttpRequest();
    request.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('tbody-table').innerHTML=this.responseText;
        }
    };
    request.open('POST', url);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send('id_curso=' + id_curso + '&busqueda=' + busqueda );
}
