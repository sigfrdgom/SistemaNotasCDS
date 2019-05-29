<?php
class PorcentajeCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->porcentajesCursoModel = $this->model('PorcentajesCursoModel');
    }

    public function index(){
        $porcentajesCurso = $this->porcentajesCursoModel->findAll();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "porcentajesCurso",
            'descripcion' => $descripcion,
            'porcentajesCurso' => $porcentajesCurso
        ];
        $this->view('pages/porcentajesCurso', $datos);
    }
}