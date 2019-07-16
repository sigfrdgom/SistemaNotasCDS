var botones = document.querySelectorAll(".btnEliminartm");

botones.forEach(boton => {

    boton.addEventListener("click", function(){

        return swal({
            title: "Esta seguro de eliminar el registro?",
            text: "Una vez eliminado, ya no podras recobrar la información!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("El registro se eliminado!", {
                        icon: "success",
                    }).then((ok) => {
                        
                        const url=this.dataset.url;
                        const dato=this.dataset.tipomodulo;
                        
                        console.log(url+dato,);
                        httpRequest(url+""+dato, function(){
                        console.log(this.responseText);
                        const tbody = document.querySelector("#tbody-table");
                        const fila  = document.querySelector("#fila-"+dato);
                        
                        // console.log("holaaaa");
                        tbody.removeChild(fila);
                                        });
                      
                        
                    });
                }
            });
    
   

    });
});


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










//actualizar tipo_modulo
$(document).ready(function () {
    $(document).on('click', '.btn_modal_editar', function () {
        $('#agregarTipoModulo').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#frmTipoModulo').attr('action', 'tipoModulo/update');
        //alert('the action is: ' + $('#frmTipoModulo').attr('method'));}
        $('#id_idTipoModulo').val(data[0]);
        $('#idTipoModulo').val(data[1]);
        $("#idEstado option[value='" + data[2] + "']").attr("selected", true);
        // $('#idEstado').val(data[2]);

        document.getElementById('mdfTipoModulo').style.display = 'inline';
        document.getElementById('aggTipoModulo').style.display = 'none';
    });
});

//LIMPIAR MODALES TIPOMODULO
$("#btnTipoModulo").click(function (event) {
    $("#frmTipoModulo")[0].reset();
    document.getElementById('mdfTipoModulo').style.display = 'none';
    document.getElementById('aggTipoModulo').style.display = 'inline';
});








//actualizar NivelCurso
$(document).ready(function () {
    $(document).on('click', '.btn_edit', function () {
        $('#agregarNivelCurso').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        console.log(data);
        $('#frmNivelCurso').attr('action', 'nivelCurso/update');
        $('#idNivelCurso').val(data[0]);
        $('#nivel_curso').val(data[1]);
        $("#idEstado option[value='" + data[2] + "']").attr("selected", true);
        
        document.getElementById('mdfNivelCurso').style.display = 'inline';
        document.getElementById('aggNivelCurso').style.display = 'none';
    });
});


//LIMPIAR MODALES NIVELCURSO
$("#btnNivelCurso").click(function (event) {
    $("#frmNivelCurso")[0].reset();
    document.getElementById('mdfNivelCurso').style.display = 'none';
    document.getElementById('aggNivelCurso').style.display = 'inline';
});


















// ------------------------------------------------------------------------------------------------
//Actualizar Modulo
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_editar_modulo', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () { return $(this).text(); }).get();

        $('#id').val(data[0]);
        $('#mnombre').val(data[1]);
        $('#mdescripcion').val(data[2]);
        $('#mhoras').val(data[3]);

        $("#mti option[value='" + data[4] + "']").attr("selected", true);

        $('#me1').val(data[5]);

        for (let index = 2; index <= 6; index++) {
            if (data[index + 4] == "---") {
                document.getElementById("me" + index).style.display = 'none';
                document.getElementById("me" + index).value = "0.0";
                document.getElementById("mel" + index).style.display = 'none';
            }
            else {
                document.getElementById("me" + index).style.display = 'block';
                document.getElementById("me" + index).value = data[index + 4];
                document.getElementById("mel" + index).style.display = 'block';
            }
        }

        if (data[11] == "ACTIVO") {
            document.getElementById("mestado1").checked = true;
        }
        else {
            document.getElementById("mestado2").checked = true;
        }

        $('#10').val(data[10]);

        document.getElementById('mod').setAttribute('action', '/SistemaNotasCDS/modulo/update');
        document.getElementById('mdfmod').style.display = 'inline';
        document.getElementById('aggmod').style.display = 'none';
        document.getElementById('counter').style.display = 'none';

    });
});

//Para limpiar el modal de modulo
$("#cancelmdlmodulo").click(function (event) {
    $("#mod")[0].reset();
});

$("#ivkmdl").click(function (event) {
    $("#mod")[0].reset();
    document.getElementById('mdfmod').style.display = 'none';
    document.getElementById('aggmod').style.display = 'inline';
    document.getElementById('counter').style.display = 'block';
});
// ------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------
// Para actualizar usuario
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_editar_usuario', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#did').val(data[0]);
        $('#dnombres').val(data[1]);
        $('#dapellidos').val(data[2]);
        $('#dfecha').val(data[3]);

        //El valor del sexo
        $('#4').val(data[4]);
        if (data[4] == "MASCULINO") {
            document.getElementById("rsexo1").checked = true;
        } else if (data[4] == "FEMENINO") {
            document.getElementById("rsexo2").checked = true;
        } else {
            document.getElementById("rsexo3").checked = true;
        }
        $('#ddui').val(data[5]);
        $('#dnit').val(data[6]);
        $('#despecialidad').val(data[7]);

        // El valor de tipo usuario
        if (data[8] == "ADMINISTRADOR") {
            document.getElementById("tipo1").checked = true;
        } else {
            document.getElementById("tipo2").checked = true;
        }

        // el password
        $('#dpass').val(data[9]);

        //el estado
        if (data[10] == "ACTIVO") {
            document.getElementById("destado1").checked = true;
        } else {
            document.getElementById("destado2").checked = true;
        }
        $('#10').val(data[10]);

        document.getElementById('dct').setAttribute('action', '/SistemaNotasCDS/docente/update');
        document.getElementById('mdfdct').style.display = 'inline';
        document.getElementById('aggdct').style.display = 'none';

    });
});



//Para limpiar el modal de usuarios
$("#cancelmdldocente").click(function (event) {
    $("#dct")[0].reset();
});

$("#ivkmdl").click(function (event) {
    $("#dct")[0].reset();
    document.getElementById('mdfdct').style.display = 'none';
    document.getElementById('aggdct').style.display = 'inline';
});
// ------------------------------------------------------------------------------------------------



// ------------------------------------------------------------------------------------------------
// Para los porcentajes de los cursos
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_editar_porcentajes', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#porid').val(data[0]);
        $("#pidc option[value='" + data[1] + "']").attr("selected", true);
        $('#pporcentaje').val(data[5]);
        $('#pobservacion').val(data[6]);


        $("#pidtm option[value='" + data[3] + "']").attr("selected", true);


        document.getElementById('prt').setAttribute('action', '/SistemaNotasCDS/porcentajeCurso/update');
        document.getElementById('mdfprt').style.display = 'inline';
        document.getElementById('aggprt').style.display = 'none';

    });
});

//Para limpiar el modal de porcentajes
$("#canclermdlporentaje").click(function (event) {
    $("#prt")[0].reset();
});

$("#ivkprt").click(function (event) {
    $("#prt")[0].reset();
    document.getElementById('mdfprt').style.display = 'none';
    document.getElementById('aggprt').style.display = 'inline';
});
// ------------------------------------------------------------------------------------------------



// ------------------------------------------------------------------------------------------------
// Para los modulos por curso
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_editar_mc', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

            $('#idmc').val(data[0]);
            $("#mcid_curso option[value='"+data[1]+"']").attr("selected", true);
            $("#mcid_modulo option[value='"+data[3]+"']").attr("selected", true);
            $("#mcid_docente option[value='"+data[5]+"']").attr("selected", true);
            $('#mcobservaciones').val(data[7]);
        
        document.getElementById('mm').setAttribute('action','/SistemaNotasCDS/modulosCurso/update');
       
    });
});

//Para limpiar el modal de modulos curso
$("#canclermdlmc").click(function(event) {
    $("#mm")[0].reset();
});

$("#ivkmmm").click(function (event) {
    $("#mm")[0].reset();

});
// ------------------------------------------------------------------------------------------------




// ------------------------------------------------------------------------------------------------
// Para actualizar el curso
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_editar_curso', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        $('#cid').val(data[0]);
        $('#cnombre').val(data[1]);
        
        $('#ccohorte').val(data[3]);
        $('#cdescripcion').val(data[4]);
        $('#cduracion').val(data[5]);

        $("#csede option[value='" + data[6] + "']").attr("selected", true);

        if (data[7] == "ACTIVO") {
            document.getElementById("cestado1").checked = true;
        } else {
            document.getElementById("cestado2").checked = true;
        }

        var nivel=this.dataset.nivel;
        
        $("#cnivel option[value='" + nivel + "']").attr("selected", true);


        $('#cfecha_inicio').val(data[9]);
        $('#cfecha_fin').val(data[10]);

        document.getElementById('curso').setAttribute('action', '/SistemaNotasCDS/curso/update');
        document.getElementById('mdfcurso').style.display = 'inline';
        document.getElementById('aggcurso').style.display = 'none';

    });
});



//Para limpiar el modal de CURSOS
$("#cancelmdlcurso").click(function (event) {
    $("#curso")[0].reset();
});

$("#ivkcurso").click(function (event) {
    $("#curso")[0].reset();
    document.getElementById('mdfcurso').style.display = 'none';
    document.getElementById('aggcurso').style.display = 'inline';
});
// ------------------------------------------------------------------------------------------------








// ------------------------------------------------------------------------------------------------
// // Para actualizar participante
// ------------------------------------------------------------------------------------------------

$(document).ready(function () {
    $(document).on('click', '.btn_editar_participante', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function () { return $(this).text(); }).get();

        // document.getElementById('password').style.display= 'none';

        $('#id').val(data[0]);
        $('#nombres').val(data[1]);
        $('#apellidos').val(data[2]);
        $('#fecha_nacimiento').val(data[3]);

        //El valor del sexo
        if (data[4] == "MASCULINO") {
            document.getElementById("sexo1").checked = true;
        } else if (data[4] == "FEMENINO") {
            document.getElementById("sexo2").checked = true;
        } else {
            document.getElementById("sexo3").checked = true;
        }
        $('#dui').val(data[5]);
        $('#nit').val(data[6]);
        $('#carnet_minoridad').val(data[7]);

        $('#direccion').val(data[8]);
        $('#telefono').val(data[9]);
        $('#email').val(data[10]);

        if (data[11] == 1) {
            document.getElementById("estado1").checked = true;
        } else {
            document.getElementById("estado2").checked = true;
        }

        $('#pass').val(data[12]);


        document.getElementById('actualizar').setAttribute('action', '/SistemaNotasCDS/participante/update');
        document.getElementById('mdfp').style.display = 'inline';
        document.getElementById('aggp').style.display = 'none';

    });
});



//Para limpiar el modal participante
$("#cancelparticipante").click(function (event) {
    $("#actualizar")[0].reset();
    document.getElementById('password').style.display = 'inline';

});

$("#participanteReset").click(function (event) {
    $("#actualizar")[0].reset();
    document.getElementById('mdfp').style.display = 'none';
    document.getElementById('aggp').style.display = 'inline';
    document.getElementById('password').style.display = 'inline';
});
// ------------------------------------------------------------------------------------------------




// ------------------------------------------------------------------------------------------------
// Para la matricula
// ------------------------------------------------------------------------------------------------
$(document).ready(function(){
    $(document).on('click', '.btn_editar_matricula', function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

            $('#mid_matricula').val(data[0]);
            $("#mid_curso option[value='"+data[1]+"']").attr("selected", true);
            $("#mid_participante option[value='"+data[3]+"']").attr("selected", true);
            if (data[5]=="ACTIVO") {
                document.getElementById("mestado1").checked= true;
            } else {
                document.getElementById("mestado2").checked= true;
            }
            $('#mobservaciones').val(data[6]);

        
        document.getElementById('matricula').setAttribute('action','/SistemaNotasCDS/matricula/update/');
        document.getElementById('aggmatricula').style.display = 'none';
        document.getElementById('edtmatricula').style.display = 'block';
        document.getElementById('btn_promover_matricula').style.display = 'block';
       
    });
});

//Para limpiar el modal de matricula
$("#cancelar_matricula").click(function(event) {
    $("#matricula")[0].reset();
});

$("#ivkmatricula").click(function(event) {
    
    document.getElementById('aggmatricula').style.display = 'block';
    document.getElementById('edtmatricula').style.display = 'none';
    document.getElementById('btn_promover_matricula').style.display = 'none';
    $("#matricula")[0].reset();
   
});
// ------------------------------------------------------------------------------------------------


//VALIDANDO CARNET, NIT O DUI EN AGREGAR
$(document).ready(function () {

        $('#dui').attr('required',true);
        $('#nit').attr("required",true);
        $('#carnet_minoridad').attr("required",true);

        $('#dui, #nit, #carnet_minoridad').keyup(function () {
            $('#dui').attr('required',true);
            $('#nit').attr("required",true);
            $('#carnet_minoridad').attr("required",true);
                var reqdui = $('#dui').val().length == 10;
                var reqnit = $('#nit').val().length == 17;
                var reqcarnet = $('#carnet_minoridad').val().length == 7;

                if (reqdui) {
                    $('#nit').removeAttr("required");
                    $('#carnet_minoridad').removeAttr("required");
                }

                if (reqnit) {
                    $('#dui').removeAttr("required");
                    $('#carnet_minoridad').removeAttr("required");
                }
                if (reqcarnet) {
                    $('#nit').removeAttr("required");
                    $('#dui').removeAttr("required");
                }

        });
    });

    //VALIDANDO CARNET, NIT O DUI EN ACTUALIZAR
function validando() {

    $('#dui').attr('required', true);
    $('#nit').attr("required", true);
    $('#carnet_minoridad').attr("required", true);
    var reqdui = $('#dui').val().length == 10;
    var reqnit = $('#nit').val().length == 17;
    var reqcarnet = $('#carnet_minoridad').val().length == 7;

    if (reqdui) {
        $('#nit').removeAttr("required");
        $('#carnet_minoridad').removeAttr("required");
    }

    if (reqnit) {
        $('#dui').removeAttr("required");
        $('#carnet_minoridad').removeAttr("required");
    }
    if (reqcarnet) {
        $('#nit').removeAttr("required");
        $('#dui').removeAttr("required");
    }

}

/**
 *  Esta funcion es la encargada de cambiar el action del formulario al presionar el boton promover de matricula
 * no tocar
 * */
function validarUpgrade() {
    var valor= document.getElementById('mid_curso').value;
    document.getElementById('matricula').setAttribute('action','/SistemaNotasCDS/matricula/upgrade/'+valor);
}

function mostrar($texto) {
   
    if (document.getElementById("CHK_"+$texto).checked) {
        document.getElementById("div_"+$texto).style.display= "block";
        $("#CHK_"+$texto).removeAttr('required');
    } else {
        document.getElementById("div_"+$texto).style.display= "none";
        $("#CHK_"+$texto).attr('required', true);
    }
}

function valFM($componente) {

    var ischk = document.getElementById("CHK_"+$componente).checked;

        if (ischk) {
            $("#date_"+$componente).attr("required", true);
            document.getElementById("date_"+$componente).setAttribute(name,"mcid_docente")
        } else {
            $("#date_"+$componente).removeAttr('required');
            document.getElementById("date_"+$componente).setAttribute(name,"")
        }
}



// ------------------------------------------------------------------------------------------------
// Para promover un curso
// ------------------------------------------------------------------------------------------------
$(document).ready(function () {
    $(document).on('click', '.btn_promover_curso', function () {
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();
        var id = data[0];
        $('#prmcid').val(data[0]);
        $('#cnombre').val(data[1]);
        document.getElementById('headprmcurso').innerHTML='Promover el curso '+data[1]+', '+data[8];
        document.getElementById('prmcurso').setAttribute('action', '/SistemaNotasCDS/curso/promote/'+id);
    
    });
});


$(".ivkprmcurso").click(function (event) {
    $("#prmcurso")[0].reset();
});
// ------------------------------------------------------------------------------------------------