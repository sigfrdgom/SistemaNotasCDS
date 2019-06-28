<?php
class NivelCurso extends Controller{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->nivelCursoModel = $this->model('NivelCursoModel');
    }

    /*Vista Principal*/
    public function index(){
        $nivelModulo = $this->nivelCursoModel->findAll();
        $descripcion = "Vista que muestra todos los niveles de los cursos que existen";
        $datos = [
            'titulo' => "Nivel del Curso",
            'descripcion' => $descripcion,
            'nivel_curso' => $nivelModulo
        ];

        $this->view('pages/nivelCurso', $datos);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'nivel_curso' => trim($_POST['nivel_curso']),
                'estado' => trim($_POST['estado'])
            ];
            if($this->nivelCursoModel->create($datos)){
                redireccionar('nivelCurso');
            }else{
                die("Error al insertar los datos");
            }
        }else{
            $datos = [
                'nivel_curso' => '',
                'estado' => ''
            ];
            $this->view('pages/nivelCurso', $datos);
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'id_nivel_curso' => $_POST['id_nivel_curso'],
                'nivel_curso' => trim($_POST['nivel_curso']),
                'estado' => trim($_POST['estado'])
            ];
            var_dump($datos);
            if($this->nivelCursoModel->update($datos)){
                redireccionar('nivelCurso');
            }else{
                die("Error al Actualizar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function delete($id){
        if (isset($id)){
            if($this->nivelCursoModel->delete($id)){
                
            }else{
                die("Error al eliminar los datos");
            }
        }else{
            // $this->index();
        }
    }

    public function  findById($id){
        if(isset($id)){
            return $this->nivelCursoModel->findById($id);
        }else{
            die("Error al buscar el dato");
        }
    }
}