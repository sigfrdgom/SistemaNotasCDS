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
                    // const tipoModulo = this.dataset.tipoModulo;
                  
                  
                    window.location.href = ruta;
                });
            }
        });

}




// const tipoModulo = this.dataset.tipoModulo;
        
//         const confirm = window.confirm("¿Deseas eliminar el Pedido " + id_Pedido + "?");

//         if(confirm){
//             // solicitud AJAX
//             httpRequest("http://localhost/examen_mvc/consulta2/eliminarPedido/"+tipoModulo, function(){
//                 console.log(this.responseText);
//                 // document.querySelector("#respuesta").innerHTML = this.responseText;

//                 const tbody = document.querySelector("#tbody-pedido");
//                 const fila  = document.querySelector("#fila-" + tipoModulo);

//                 tbody.removeChild(fila);
//             });





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