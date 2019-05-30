<?php
class Matricula extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->matriculaModel = $this->model('MatriculaModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');

    }

    public function index(){
        $matricula = $this->matriculaModel->findAll();
        $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findAll();
        
        $descripcion = "Vista que muestra todos las matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula,
            'participante' => $participante ,
            'curso' => $curso ,
        ];
        $this->view('pages/matricula', $datos);
    }
}