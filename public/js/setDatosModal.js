$(document).ready(function(){
    $(document).on('click', '.btn_modal_editar', function(){
        $('#agregarTipoModulo').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#frmTipoModulo').attr('action', 'tipoModulo/update');
        //alert('the action is: ' + $('#frmTipoModulo').attr('method'));}
        $('#id_idTipoModulo').val(data[0]);
        $('#idTipoModulo').val(data[1]);
        $('#idEstado').val(data[2]);
    });
});

$(document).ready(function(){
    $(document).on('click', '.btn_modal_editar', function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
            $('#id').val(data[0]);
            $('#mnombre').val(data[1]);
            $('#mdescripcion').val(data[2]);
            $('#mhoras').val(data[3]);
            
            
            $("#mti option[value='"+data[4]+"']").attr("selected", true);

            $('#me1').val(data[5]);
            $('#me2').val(data[6]);
            $('#me3').val(data[7]);
            $('#me4').val(data[8]);
            $('#me5').val(data[9]);
            $('#me6').val(data[10]);
            
           
            if (data[11]=="ACTIVO") {
                document.getElementById("mestado1").checked= true;
            } else {
                document.getElementById("mestado2").checked= true;
            }
            $('#10').val(data[10]);
            
        document.getElementById('mod').setAttribute('action','/SistemaNotasCDS/modulo/update');
        document.getElementById('mdfmod').style.display= 'inline';
        document.getElementById('aggmod').style.display= 'none';
        
    });
});

//Para limpiar el modal de usuarios
$("#cancelmdlmodulo").click(function(event) {
    $("#mod")[0].reset();
});

$("#ivkmdl").click(function(event) {
    $("#mod")[0].reset();
    document.getElementById('mdfmod').style.display= 'none';
    document.getElementById('aggmod').style.display= 'inline';
});








$(document).ready(function(){
    $(document).on('click', '.btn_modal_editar', function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

            $('#mid').val(data[0]);
            $('#dnombres').val(data[1]);
            $('#dapellidos').val(data[2]);
            $('#dfecha').val(data[3]);
            //El valor del sexo
            $('#4').val(data[4]);
            if (data[4] == "MASCULINO") {
                document.getElementById("rsexo1").checked= true;
            } else if (data[4]=="FEMENINO") {
                document.getElementById("rsexo2").checked= true;
            } else {
                document.getElementById("rsexo3").checked= true;
            }
            $('#ddui').val(data[5]);
            $('#dnit').val(data[6]);
            $('#despecialidad').val(data[7]);
            // El valor de tipo usuario
            if (data[8]=="ADMINISTRADOR") {
                document.getElementById("tipo1").checked= true;
            } else {
                document.getElementById("tipo2").checked= true;
            }
            // el password
            $('#dpass').val(data[9]);
            //el estado
            if (data[10]=="ACTIVO") {
                document.getElementById("destado1").checked= true;
            } else {
                document.getElementById("destado2").checked= true;
            }
            $('#10').val(data[10]);
            
        document.getElementById('dct').setAttribute('action','/SistemaNotasCDS/docente/update');
        document.getElementById('mdfdct').style.display= 'inline';
        document.getElementById('aggdct').style.display= 'none';
        
    });
});

//Para limpiar el modal de usuarios
$("#cancelmdldocente").click(function(event) {
    $("#dct")[0].reset();
});

$("#ivkmdl").click(function(event) {
    $("#dct")[0].reset();
    document.getElementById('mdfdct').style.display= 'none';
    document.getElementById('aggdct').style.display= 'inline';
});


