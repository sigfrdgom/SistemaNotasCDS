<?php
class Notas extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->notaModel = $this->model('NotaModel');
    }

    public function index(){
        $nota = $this->notaModel->findAll();
        $descripcion = "Vista que muestra todos las notas que existen";
        $datos = [
            'titulo' => "Nota",
            'descripcion' => $descripcion,
            'nota' => $nota
        ];
        $this->view('pages/nota', $datos);
    }
}