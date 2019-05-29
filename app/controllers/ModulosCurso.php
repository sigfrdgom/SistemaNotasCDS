<?php
class ModulosCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
    }

    public function index(){
        $modulosCurso = $this->modulosCursoModel->findAll();
        $descripcion = "Vista que muestra todos los modulosCurso que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulosCurso' => $modulosCurso
        ];
        $this->view('pages/modulosCurso', $datos);
    }
}