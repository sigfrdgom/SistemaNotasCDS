<?php

class Errores extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->index();
    }

    public function index(){
        $this->view('pages/errores/error404');
    }
}