<?php
class Paginas extends Controller{
    
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->ejemploModel = $this->model('Ejemplo');
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    /*Vista Principal*/
    public function index(){
        $nombres = $this->ejemploModel->obtenerUsuarios();
        $datos = [
            'titulo' => "Sistemas de Notas",
            'nombres' => $nombres
        ];

        $this->view('pages/inicio', $datos);
    }

    /*Vista de Vista de Tipo Modulo*/
    public function tipoModulo(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $datos = [
          'tipoModelo' => $tipoModulo
        ];
        $this->view('pages/tipoModulo', $datos);
    }

    /*Ejemplo de envio de parametros*/
    public function actualizar($num_registros){
        echo $num_registros;
    }
}

?>
