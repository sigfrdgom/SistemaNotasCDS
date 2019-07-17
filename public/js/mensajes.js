function menjaseEliminar(ruta, dato){
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
                    
                    httpRequest("http://localhost/SistemaNotasCDS/"+ruta, function(){
                    const tbody = document.querySelector("#tbody-table");
                    const fila  = document.querySelector("#fila-"+dato);

                    console.log(fila);
                    tbody.removeChild(fila);
                    });
                    
                });
            }
        });

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


function menjaseBaja(ruta, dato=null){
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

function activacionEstado(){
    document.getElementById('seteoEstado').style.display= 'inline';
}

function desactivarEstado(){
    document.getElementById('seteoEstado').style.display= 'none';
}
