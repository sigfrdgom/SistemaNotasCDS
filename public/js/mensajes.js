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