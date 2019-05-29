<?php
class Participante extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->participanteModel = $this->model('ParticipanteModel');
    }

    public function index(){
        $participante = $this->participanteModel->findAll();
        $descripcion = "Vista que muestra todos las participantes que existen";
        $datos = [
            'titulo' => "participante",
            'descripcion' => $descripcion,
            'participante' => $participante
        ];
        $this->view('pages/participante', $datos);
    }

}