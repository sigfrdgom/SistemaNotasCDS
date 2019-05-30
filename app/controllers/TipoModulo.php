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
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            $datos = [
                'nombre' => '',
                'estado' => ''
            ];
            $this->view('pages/tipoModulo', $datos);
        }
    }

    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
            $datos = [
                'nombre' => trim($_POST['nombreTipoModulo']),
                'estado' => trim($_POST['estado'])
            ];
            if($this->tipoModuloModel->update($datos)){
                redireccionar('tipoModulo');
            }else{
                die("Error al Actualizar los datos");
            }
        }else{
            //Obtener la informacion de la entidad
            $info = $this->tipoModuloModel->findById($id);
            $datos = [
                'id_tipo_modulo' => $info['id_tipo_modulo'],
                'nombre' => $info['nombre'],
                'estado' => $info['estado']
            ];
            $this->view('pages/tipoModulo', $datos);
        }
    }

    public function delete($id){
        if (isset($id)){
            if($this->tipoModuloModel->delete($id)){
                redireccionar('tipoModulo');
            }else{
                die("Error al eliminar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function  findById($id){
        if(isset($id)){
            return $this->tipoModuloModel->findById($id);
        }else{
            die("Error al buscar el dato");
        }
    }
}