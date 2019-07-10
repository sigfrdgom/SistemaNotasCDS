<?php
class Index extends Controller
{
    public function __construct() {
        // //Cargar Modelos de la paginas;
        // $this->participanteModel = $this->model('ParticipanteModel');
        // $this->docenteModel = $this->model('DocenteModel');
        // $this->notaModel = $this->model('NotaModel');
        // $this->cursoModel = $this->model('CursoModel');
        // $this->moduloModel = $this->model('ModuloModel');
    }

    /*Vista Principal*/
    public function index(){

        // $nombres = array();
        // $n_participantes= $this->participanteModel->count();
        // $n_usuarios = $this->docenteModel->count();
        // $n_notas = $this->notaModel->count();
        // $n_cursos = $this->cursoModel->count();
        // $n_modulos = $this->moduloModel->count();
        // $descripcion = "";
        // $datos = [
        //     'titulo' => "Inicio",
        //     'descripcion' => $descripcion,
        //     'nombres' => $nombres,
        //     'n_participantes' => $n_participantes[0]->n_registros,
        //     'n_usuarios' => $n_usuarios[0]->n_registros,
        //     'n_notas' => $n_notas[0]->n_registros,
        //     'n_cursos' => $n_cursos[0]->n_registros,
        //     'n_modulos' => $n_modulos[0]->n_registros,
        // ];

        

        $this->view('pages/login/login');
    }






}