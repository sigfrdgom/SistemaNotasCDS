<?php
class Notas extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
    }

    public function index(){
        $descripcion = "Vista que muestra todos los cursos";
        $cursos = $this->cursoModel->orderByFechaDesc();
        $datos = [
            'titulo' => "Mostrar Cursos",
            'descripcion' => $descripcion,
            'cursos' => $cursos,
        ];
        $this->view('pages/notas/mostrarCurso', $datos);
    }

    public function modulos($idCurso){
            $descripcion = "Vista que muestra todos los Modulos del curso";
            $modulos = $this->moduloModel->findbyIdCurso($idCurso);
            $datos = [
                'titulo' => "Modulos del curso",
                'descripcion' => $descripcion,
                'modulos' => $modulos
            ];
            $this->view('pages/notas/mostrarModulos', $datos);
    }

    public function notas(){
        $nota = $this->notaModel->findAll();
        $modulosCurso = $this->modulosCursoModel->findAll();
        $participante = $this->participanteModel->findAll();

        $descripcion = "Vista que muestra todos las notas que existen";
        $datos = [
            'titulo' => "Nota",
            'descripcion' => $descripcion,
            'nota' => $nota,
            'moduloCurso' => $modulosCurso ,
            'participante' => $participante 
        ];
        $this->view('pages/notas/nota', $datos);
    }


}