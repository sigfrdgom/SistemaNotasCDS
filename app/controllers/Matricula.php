<?php
class Matricula extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->matriculaModel = $this->model('MatriculaModel');
    }

    public function index(){
        $matricula = $this->matriculaModel->findAll();
        $descripcion = "Vista que muestra todos las matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula
        ];
        $this->view('pages/matricula', $datos);
    }
}