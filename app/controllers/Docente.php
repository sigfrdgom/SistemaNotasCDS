<?php
class Docente extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->docenteModel = $this->model('DocenteModel');
    }
    public function index(){
        $docente = $this->docenteModel->findAll();
        $descripcion = "Vista que muestra todos los docentes que existen";
        $datos = [
            'titulo' => "Docente",
            'descripcion' => $descripcion,
            'docente' => $docente
        ];
        $this->view('pages/docente', $datos);
    }
}