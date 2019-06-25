<?php
class PorcentajeCurso extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->porcentajesCursoModel = $this->model('PorcentajesCursoModel');
        $this->tipoModuloModel = $this->model('TipoModuloModel');
        $this->cursoModel = $this->model('CursoModel');
    }

    public function index(){
        $porcentajesCurso = $this->porcentajesCursoModel->findForTable();
        $tipoModulo = $this->tipoModuloModel->findAll();
        $curso = $this->cursoModel->findAll();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "porcentajesCurso",
            'descripcion' => $descripcion,
            'porcentajesCurso' => $porcentajesCurso,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso
        ];
        $this->view('pages/porcentajesCurso', $datos);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'id_porcentaje_curso' => null,
                'id_curso' => trim($_POST['pid_curso']),
                'id_tipo_modulo' => trim($_POST['pid_tipo_modulo']),
                'porcentaje' => trim($_POST['pporcentaje']),
                'observacion' => trim($_POST['pobservacion'])
            ];
            var_dump($datos);
            if($this->porcentajesCursoModel->create($datos)){
                redireccionar('porcentajeCurso');
            }else{
                die("Error al insertar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $datos = [
                'id_porcentajes_curso' => trim($_POST['porid']),
                'id_curso' => trim($_POST['pid_curso']),
                'id_tipo_modulo' => trim($_POST['pid_tipo_modulo']),
                'porcentaje' => trim($_POST['pporcentaje']),
                'observacion' => trim($_POST['pobservacion'])
            ];
            var_dump($datos);
            if($this->porcentajesCursoModel->update($datos)){
                redireccionar('porcentajeCurso');
            }else{
                die("Error al insertar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function delete($id){
        if (isset($id)){
            if($this->porcentajesCursoModel->delete($id)){
                redireccionar('porcentajeCurso');
            }else{
                die("Error al eliminar los datos");
            }
        }else{
            $this->index();
        }
    }

    public function porcentajes(){
        $porcentajesCurso = $this->porcentajesCursoModel->findForTable();
        $tipoModulo = $this->tipoModuloModel->findAll();
        $curso = $this->cursoModel->findAll();
        $cursoSinPorcentaje = $this->cursoModel->cursoSinPorcentaje();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes de los Curso",
            'descripcion' => $descripcion,
            'porcentajesCurso' => $porcentajesCurso,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso,
            'cursoSinPorcentaje' => $cursoSinPorcentaje
        ];
        $this->view('pages/porcentajesCurso/porcentajes', $datos);
    }

}