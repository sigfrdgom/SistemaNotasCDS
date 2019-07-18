<?php
class General extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        
    }

    public function acercaDe(){

        $datos = [
            'titulo' => "Sobre el proyecto sistema de notas CDS",
        ];

        $this->view('pages/general/acercaDe', $datos);
    }

    public function faq(){
        $this->sessionActivaXD();
        $datos = [
            'titulo' => "Preguntas y respuestas frecuentes.",
        ];
        $this->view('pages/general/faq', $datos);
    }

}