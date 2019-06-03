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