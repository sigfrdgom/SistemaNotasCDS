$(document).ready(function(){
    $(document).on('click', '.btn_modal_editar', function(){
        $('#agregarTipoModulo').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#frmTipoModulo').attr('action', 'tipoModulo/update');
        //alert('the action is: ' + $('#frmTipoModulo').attr('method'));
        $('#idTipoModulo').val(data[0]);
        $('#idEstado').val(data[1]);
    });
});

$(document).ready(function(){
    $(document).on('click', '.btn_modal_editar', function(){
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#frmTipoModulo').attr('action', 'tipoModulo/update');
        $('#0').val(data[0]);
        $('#1').val(data[1]);
        $('#2').val(data[2]);
        $('#3').val(data[3]);
        //El valor del sexo
        $('#4').val(data[4]);

        $('#5').val(data[5]);
        $('#6').val(data[6]);
        $('#7').val(data[7]);

        //El valor del tipo usuario
        $('#8').val(data[8]);

        // el password
        $('#9').val(data[9]);

        //el estado
        $('#10').val(data[10]);
       

        
    });
});