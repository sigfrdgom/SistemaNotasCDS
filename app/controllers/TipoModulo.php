<?php
class TipoModulo extends Controller{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    /*Vista Principal*/
    public function index(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $descripcion = "Vista que muestra todos los tipos de modulos que existen";
        $datos = [
            'titulo' => "Tipo Modulo",
            'descripcion' => $descripcion,
            'TipoModulo' => $tipoModulo
        ];

        $this->view('pages/tipoModulo', $datos);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'estado' => trim($_POST['estado'])
            ];
            if($this->tipoModuloModel->crate($datos)){
                redireccionar('tipomodulo');
            }else{
                die("Error al insertar los datos");
            }
        }else{
            $datos = [
                'nombre' => '',
                'estado' => ''
            ];
            $this->view('pages/tipoModulo', $datos);
        }

    }
}