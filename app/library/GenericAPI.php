<?php

class GenericAPI extends Controller
{
    protected $url;

    protected function findAll()
    {
        //Comprueba que la peticion ha sido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                //Obtiene los datos del modelo
                $rest = $this->model->findAll();
                //Muestra los datos en formato JSON
                echo json_encode($rest);
                //Manda un estatus 200 que la peticion fue correcta
                return http_response_code(200);
            } catch (Exception $e) {
                //Manda un estatus 503 diciendo que algo salio mal en el servidor
                return http_response_code(503);
            }
        } else {
            //Manda un error diciendo que el usuario realizo un bad request
            return http_response_code(400);
            //Mensaje que verá el usuario
            echo json_encode(array("Mensaje" => "Error! Algo salio mal al realizar la peticion"));
        }
    }

    protected function findById($id){
        //Comprueba que la peticion ha sido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                //Obtiene los datos del modelo
                $rest = $this->model->findById($id);
                if ($rest == false){
                    $rest = array();
                }
                //Muestra los datos en formato JSON
                echo json_encode($rest);
                //Manda un estatus 200 que la peticion fue correcta
                return http_response_code(200);
            } catch (Exception $e) {
                //Manda un estatus 503 diciendo que algo salio mal en el servidor
                http_response_code(503);
            }
        } else {
            //Manda un error diciendo que el usuario realizo un bad request
            http_response_code(400);
            //Mensaje que verá el usuario
            echo json_encode(array("Mensaje" => "Error! Algo salio mal al realizar la peticion"));
        }
    }

    protected function findByRange($inicio, $maxResult){
        //Comprueba que la peticion ha sido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                //Obtiene los datos del modelo
                $rest = $this->model->findByRange($inicio-1, $maxResult);
                //Muestra los datos en formato JSON
                echo json_encode($rest);
                //Manda un estatus 200 que la peticion fue correcta
                return http_response_code(200);
            } catch (Exception $e) {
                //Manda un estatus 503 diciendo que algo salio mal en el servidor
                 http_response_code(503);
            }
        } else {
            // Mostrar codigo de respuesta - 400 bad request
            http_response_code(400);

            // Mostrar mensaje
            echo json_encode(array("Mensaje" => "Error! Realizo una peticion incorrecta al servidor"));
        }
    }

    protected function create(){
        //Comprueba que la peticion ha sido enviada por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Headers
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

            $datos = json_decode(file_get_contents("php://input"), true);

            if ($this->model->create($datos)) {
                // set response code - 201 created
                http_response_code(201);

                // Mostrar mensaje que se creo el registro
                echo json_encode(array("Mensaje" => "El registro fue creado con exito"));
            } else {
                // set response code - 503 service unavailable
                http_response_code(503);

                // Mostrar mensaje
                echo json_encode(array("Mensaje" => "Algo salio mal al realizar la peticion"));
            }
        } else {
            // Mostrar codigo de respuesta - 400 bad request
            http_response_code(400);

            // Mostrar mensaje
            echo json_encode(array("Mensaje" => "Error! Realizo una peticion incorrecta al servidor"));
        }
    }

    protected function update(){
        //Comprueba que la peticion ha sido enviada por POST
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

            // Headers
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: PUT');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

            $datos = json_decode(file_get_contents("php://input"), true);

            if ($this->model->update($datos)) {
                // set response code - 201 created
                http_response_code(200);

                // Mostrar mensaje que se creo el registro
                echo json_encode(array("Mensaje" => "El registro fue actualizado con exito"));
            } else {
                // set response code - 503 service unavailable
                http_response_code(503);

                // Mostrar mensaje
                echo json_encode(array("Mensaje" => "Algo salio mal al realizar la peticion"));
            }
        } else {
            // Mostrar codigo de respuesta - 400 bad request
            http_response_code(400);

            // Mostrar mensaje
            echo json_encode(array("Mensaje" => "Realizo una peticion incorrecta al servidor"));
        }
    }

    protected function delete($id){
        //Comprueba que la peticion ha sido enviada por POST
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

            // Headers
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: DELETE');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

            if ($this->model->delete($id)) {
                // set response code - 201 created
                http_response_code(200);

                // Mostrar mensaje que se creo el registro
                echo json_encode(array("Mensaje" => "El registro fue eliminado con exitosamente"));
            } else {
                // set response code - 503 service unavailable
                http_response_code(503);

                // Mostrar mensaje
                echo json_encode(array("Mensaje" => "Algo salio mal al realizar la peticion"));
            }
        } else {
            // Mostrar codigo de respuesta - 400 bad request
            http_response_code(400);

            // Mostrar mensaje
            echo json_encode(array("Mensaje" => "Realizo una peticion incorrecta al servidor"));
        }
    }

}