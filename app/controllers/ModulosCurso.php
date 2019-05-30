<?php
class ModulosCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');

    }

    public function index(){
        $modulosCurso = $this->modulosCursoModel->findAll();
        $docente = $this->docenteModel->findAll();
        $curso = $this->cursoModel->findAll();
        $modulo = $this->moduloModel->findAll();

        $descripcion = "Vista que muestra todos los modulosCurso que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulosCurso' => $modulosCurso,
            'docente' => $docente,
            'curso' =>$curso,
            'modulo' =>$modulo
        ];
        $this->view('pages/modulosCurso', $datos);
    }
}