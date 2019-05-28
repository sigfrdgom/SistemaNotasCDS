<?php
class Paginas extends Controller{
    
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    /*Vista Principal*/
    public function index(){
        $nombres = array();
        $descripcion = "";
        $datos = [
            'titulo' => "Inicio",
            'descripcion' => $descripcion,
            'nombres' => $nombres
        ];

        $this->view('pages/inicio', $datos);
    }

    /*Vista de Vista de Tipo Modulo*/
    public function tipoModulo(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $descripcion = "Vista que muestra todos los tipos de modelos que existen";
        $datos = [
            'titulo' => "Tipo Modulo",
            'descripcion' => $descripcion,
            'tipoModelo' => $tipoModulo
        ];
        $this->view('pages/tipoModulo', $datos);
    }

    public function docentes(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $descripcion = "Vista que muestra todos los tipos de modelos que existen";
        $datos = [
            'titulo' => "Docente",
            'descripcion' => $descripcion,
        ];
        $this->view('pages/docente', $datos);
    }

    /*Ejemplo de envio de parametros*/
    public function actualizar($num_registros){
        echo $num_registros;
    }
}

?>
