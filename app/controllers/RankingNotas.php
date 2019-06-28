<?php

class RankingNotas extends Controller
{
    public function __construct()
    {
        //Cargar Modelos de la paginas;
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
    }

    public function index()
    {
        $descripcion = "Vista que muestra todos los cursos";
        $cursos = $this->cursoModel->orderByFechaDesc();
        $datos = [
            'titulo' => "Mostrar Cursos",
            'descripcion' => $descripcion,
            'cursos' => $cursos,
        ];
        $this->view('pages/ranking/mostrarCurso', $datos);
    }

    public function nivel($idCurso)
    {
        $nivel = $this->nivelCursoModel->findAll();
        $datos = [
            'titulo' => "Niveles del Curso",
            'nivel' => $nivel,
            'id_curso' => trim($idCurso)
        ];
        $this->view('pages/ranking/mostrarNivel', $datos);
    }


}