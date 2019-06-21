/*
    var url = 'http://localhost/SistemaNotasCDS/';

    function findAll(controller) {
        fetch(url+controller)
            .then(res => res.json())
            .then(datos => {
                console.log(datos);
            })
    }

    function get(controller){
        let data = await(fetch(url+controller)
            .then(respuesta => {
                console.log(respuesta)
                return respuesta.text;
            })
            .catch(error => {
                console.log("Hubo un error " + error);
            })
        )
        return data;
    }

    //Metodo que se encargar de mostrar los datos de una tabla
    function buscarDatos(busqueda) {
        $.ajax({
            url: 'http://localhost/sistemanotascds/notarest/findByParticipante/1/1/'+busqueda,
            type: 'GET',
            success: function (response) {
                const valores = JSON.parse(response);
                let tbody = '';

                valores.forEach(alumno => {
                    tbody += "<tr>" +
                        "<td class=\"td-center\">"+alumno.nombres+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.apellidos+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota1+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota2+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota3+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota4+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota5+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.nota6+"</td>\n" +
                        "<td class=\"td-center\">"+alumno.observaciones+ "</td>\n" +
                        "<td class=\"td-center\"><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>\n" +
                        "</td>"+
                        "</tr>";
                });
                $("#contenido").html(tbody)
            }
        });
    }
    */
 */