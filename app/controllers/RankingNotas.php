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

    public function ranking(){

        $notas = $this->notaModel->findNotasByCursoModuloNivel(1,1,1,1);
        $modulos= $this->modulosCursoModel->modulosByCurso(1);
        $participantes = $this->participanteModel->participantesByCurso(1);

        $matrizModulos = array();
        $c=0;
        foreach ($modulos as $modulo){
            $matrizModulos[$c] = $this->notaModel->findNotasByCursoModuloNivel(1,$modulo->id_modulo,1,1);
            $c++;
        }


        $datos = [
            'titulo' => "Ranking de Notas",
            'notas' => $notas,
            'modulos' => $modulos,
            'participantes' => $participantes,
            'matrizModulos' => $matrizModulos
        ];
        $this->view('pages/ranking/rankingNotas', $datos);
    }


}