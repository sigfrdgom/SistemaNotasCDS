<?php
class Modulo extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->moduloModel = $this->model('ModuloModel');
    }

    public function index(){
        $modulo = $this->moduloModel->findAll();
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulo' => $modulo
        ];
        $this->view('pages/modulo', $datos);
    }

}