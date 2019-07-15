<?php
class TipoModulo extends Controller{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    /*Vista Principal*/
    public function index(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $descripcion = "Vista que muestra todos los tipos de modulos que existen";
        $datos = [
            'titulo' => "Tipo Modulo",
            'descripcion' => $descripcion,
            'TipoModulo' => $tipoModulo
        ];

        $this->view('pages/tipoModulo', $datos);
    }

    public function create(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
        {
            $datos = [
                'nombre' => trim($_POST['nombreTipoModulo']),
                'estado' => trim($_POST['estado'])
            ];
            if($this->tipoModuloModel->create($datos)){
                redireccionar('tipoModulo');
            }else{
                die("Error al insertar los datos");
            }
        }else{
            // $datos = [
            //     'nombre' => '',
            //     'estado' => ''
            // ];
            // $this->view('pages/tipoModulo', $datos);
            redireccionar('tipoModulo');
        }
    }

    public function update(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')&&$this->sessionActiva())
        {
            $datos = [
                'id_tipo_modulo' => $_POST['id_tipo_modulo'],
                'nombre' => trim($_POST['nombreTipoModulo']),
                'estado' => trim($_POST['estado'])
            ];
            var_dump($datos);
            if($this->tipoModuloModel->update($datos)){
                redireccionar('tipoModulo');
            }else{
                die("Error al Actualizar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function delete($id=null){
        if(isset($id)&&$this->sessionActiva())
            {
            if($this->tipoModuloModel->delete($id)){
                // redireccionar('tipoModulo');
            }else{
                redireccionar('tipoModulo');
                die("Error al eliminar los datos");
            }
        }else{
             $this->index();
        }
    }

    public function  findById($id = null){
        if(isset($id)&&$this->sessionActiva())
            {
            return $this->tipoModuloModel->findById($id);
        }else{
            redireccionar('tipoModulo');
            die("Error al buscar el dato");
        }
    }
}