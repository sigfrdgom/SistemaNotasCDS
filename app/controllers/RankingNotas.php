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
        $nivel = $this->nivelCursoModel->findNivelByCurso($idCurso);
        $datos = [
            'titulo' => "Niveles del Curso",
            'nivel' => $nivel,
            'id_curso' => trim($idCurso)
        ];
        $this->view('pages/ranking/mostrarNivel', $datos);
    }

    public function ranking(){

        $datos = [
            'id_curso' => trim($_POST['id_curso']),
            'nivel' => trim($_POST['nivel'])
        ];

        $modulos= $this->modulosCursoModel->modulosByCurso($datos['id_curso']);
        $participantes = $this->participanteModel->participantesByCursoNivel($datos['id_curso'], $datos['nivel']);

        $matrizModulos = array();
        $c=0;
        foreach ($modulos as $modulo){
            $matrizModulos[$c] = $this->notaModel->findNotasByCursoModuloNivel($datos['id_curso'],$modulo->id_modulo,$datos['nivel']);
            $c++;
        }

        $datos = [
            'titulo' => "Ranking de Notas",
            'modulos' => $modulos,
            'participantes' => $participantes,
            'matrizModulos' => $matrizModulos
        ];
        $this->view('pages/ranking/rankingNotas', $datos);
    }


}