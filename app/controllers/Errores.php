<?php

class Errores extends Controller
{
    public function __construct() {
        //Cargar al inciar la clase de la paginas;
    }

    public function error404(){
        $this->view('pages/errores/error404');
    }

    public function  error500(){
        $this->view('pages/errores/error500');
    }

    public function  errorNoAUTH(){
        $this->view('pages/errores/noauth');
    }

    public function  errorNoLOG(){
        $this->view('pages/errores/nologin');
    }
}