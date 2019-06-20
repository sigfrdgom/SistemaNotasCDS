<?php

class NotaRest extends GenericAPI
{

    public function __construct()
    {
        $this->model = $this->model('NotaModel');
        $this->url = constant('RUTA_URL') . "/NotaRest";
    }

    public function findAll()
    {
        return parent::findAll();
    }

    public function findById($id)
    {
        return parent::findById($id);
    }

    public function findByRange($inicio, $maxResult)
    {
        return parent::findByRange($inicio, $maxResult);
    }

    public function create()
    {
        return parent::create();
    }

    public function update()
    {
        parent::update();
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    public function findByParticipante($id_curso, $id_modulo, $busqueda){
        //Comprueba que la peticion ha sido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {
                //Obtiene los datos del modelo
                $rest = $this->model->findByParticipante(trim($id_curso), trim($id_modulo), trim($busqueda));
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


}