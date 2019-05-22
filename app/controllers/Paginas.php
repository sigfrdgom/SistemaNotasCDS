<?php
class Paginas extends Controller{
    
    public function __construct() {
        //Cargar Controlador de paginas;
        $this->ejemploModel = $this->model('Ejemplo');
    }

    public function ejemplo(){
        
    }

    public function index(){
        $usuarios = $this->ejemploModel->obtenerUsuarios();
        $datos = [
            'titulo' => "Bienvenidos A la plantilla MVC",
            'usuarios' => $usuarios
        ];

        $this->view('pages/inicio', $datos);
    }

    public function actualizar($num_registros){
        echo $num_registros;

    }
}

?>