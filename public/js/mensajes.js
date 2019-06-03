function menjaseEliminar(ruta){
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
                    window.location.href = ruta;
                });
            }
        });

}

function menjaseBaja(ruta){
    return swal({
        title: "¿Esta seguro de dar de baja?",
        text: "Una vez dado de baja, deberas gestionar este usuario de forma complicada!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDown) => {
            if (willDown) {
                swal("El registro se ha dado de baja!", {
                    icon: "success",
                }).then((ok) => {
                    window.location.href = ruta;
                });
            }
        });

}