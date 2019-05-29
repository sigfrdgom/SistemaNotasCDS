<?php
class Index extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
    }

    /*Vista Principal*/
    public function index(){
        $nombres = array();
        $descripcion = "";
        $datos = [
            'titulo' => "Inicio",
            'descripcion' => $descripcion,
            'nombres' => $nombres
        ];

        $this->view('pages/inicio', $datos);
    }
}