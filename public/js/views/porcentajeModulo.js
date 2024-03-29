$('#alert-error').hide();
$('#alert-warning').hide();
window.addEventListener('DOMContentLoaded', listener);
var url = "http://localhost/SistemaNotasCDS/porcentajeCurso/";
var div_seleccion

function listener() {
    document.getElementById('btn_add').addEventListener('click', div_agregar);
    document.getElementById('btn_edit').addEventListener('click', div_agregar);

    div_seleccion = document.getElementById('div_seleccion');
}

function listener_guardar() {
    document.getElementById('form_porcentajes').addEventListener('submit', guardarPorcentajes);
}

function div_agregar(e) {
    let btn = e.target.value;
    e.preventDefault();
    if(btn == "agregar"){
        httpRequest(url+"seleccionAdd", function () {
            div_seleccion.innerHTML= this.responseText;
            document.getElementById('btn-seleccionar').addEventListener('click', mostrarDivAdd);
        });
    }
    if(btn == "editar"){
        httpRequest(url+"seleccionEdit", function () {
            div_seleccion.innerHTML= this.responseText;
            document.getElementById('btn-seleccionar').addEventListener('click', mostrarDivEdit);
        });
    }
}

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}

function mostrarDivAdd(e) {
    e.preventDefault();
    var id_curso = document.getElementById('select_id_curso').value;

    if(id_curso.length != 0) {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('div_procentajes').innerHTML = this.responseText;
                $('#alert-error').hide();
                $('#alert-warning').hide();
                listener_guardar();
            }
        };
        peticion.open('GET', url + 'mostrarPorcentajesAdd/' + id_curso);
        peticion.send();
    }else{
        Swal.fire({
            type: 'error',
            title: 'No existe registros',
            text: 'Vuelve a intentar cuando existan registros',
        });
    }
}

function mostrarDivEdit(e) {
    e.preventDefault();
    var id_curso = document.getElementById('select_id_curso').value;

    if(id_curso.length != 0) {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                document.getElementById('div_procentajes').innerHTML = this.responseText;
                $('#alert-error').hide();
                $('#alert-warning').hide();
                listener_guardar();
            }
        };
        peticion.open('GET', url + 'mostrarPorcentajesEdit/' + id_curso);
        peticion.send();
    }else{
        Swal.fire({
            type: 'error',
            title: 'No existe registros',
            text: 'Vuelve a intentar cuando existan registros',
        });
    }
}

function guardarPorcentajes(e) {

    var id_tipo_modulos = document.getElementsByClassName('id_procentaje_class');
    var porcentajes = document.getElementsByClassName('porcentaje');

    var id_tipo_modulos_array = [].map.call(id_tipo_modulos, function( id_tipo_modulos ) {
        return id_tipo_modulos.value;
    });

    var porcentajes_array = [].map.call(porcentajes, function( porcentajes ) {
        return porcentajes.value;
    });

    console.log(porcentajes_array);
    console.log(id_tipo_modulos_array);
    console.log(sumar());

    if (sumar()== true){

    }else{
        e.preventDefault();
        Swal.fire({
            type: 'error',
            title: 'Error en los porcentajes',
            text: 'Los porcentajes deben sumar 100%',
        });
    }
}

//Funcion que realizar la suma de los porcentajes
function sumar() {
    var total = 0;
    var cont = 0;

    $(".porcentaje").each(function () {
        cont++;
        if (isNaN(parseFloat($(this).val()))) {
            total += 0;
        } else {
            total += parseFloat($(this).val());
        }
    });

    var mayor=false;
    var menor=false;
//funcion que verifica el prcentaje total sea 100%
    if(total == 0){
        return false;
    }
    if (total > 100) {
        $('#alert-error').show();
        document.getElementById('total_danger').innerHTML = total;
    } else {
        $('#alert-error').hide();
        mayor=true;
    }
    if (total > 0 && total < 100) {
        $('#alert-warning').show();
        document.getElementById('total_warning').innerHTML = total;
    } else {
        $('#alert-warning').hide();
        menor=true;
    }

    if(mayor==true && menor==true){
        return true;
    }else{
        return false;
    }
}