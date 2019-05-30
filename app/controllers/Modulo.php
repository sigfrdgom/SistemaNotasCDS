<?php
class Modulo extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->moduloModel = $this->model('ModuloModel');
        // No se si sea correcto
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    public function index(){
        $modulo = $this->moduloModel->findAll();
        $tipoModulo = $this->tipoModuloModel->findAll();
            
        
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulo' => $modulo,
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/modulo', $datos);
    }

}