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
        $this->sessionActivaX();
        // $porcentajesCurso = $this->porcentajesCursoModel->findForTable();
        // $tipoModulo = $this->tipoModuloModel->findAll();
        $curso = $this->cursoModel->findByCohorte();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes por Curso",
            'descripcion' => $descripcion,
            // 'porcentajesCurso' => $porcentajesCurso,
            // 'tipoModulo' => $tipoModulo,
            'curso' => $curso
        ];
        $this->view('pages/porcentajesCurso/porcentajesCursoCohorte', $datos);
    }

    public function nivel($cohorte)
    {
        $this->sessionActivaX();
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Vista que muestra todos las cursos con sus respectivos modulos que existen";
        $datos = [
            'titulo' => "Niveles ".base64_decode($cohorte),
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];
        $this->view('pages/porcentajesCurso/porcentajesCursoNivel', $datos);
    }

    public function curso($id_curso)
    {
        $this->sessionActivaX();
        $curso = $this->cursoModel->findById($id_curso);
        $porcentajesCurso = $this->porcentajesCursoModel->findByNivel($id_curso);
        $tipoModulo = $this->tipoModuloModel->findAll();

        
        // $modulosCurso = $this->modulosCursoModel->findByNivel($id_curso);
        
        
        $descripcion = "Vista que muestra todos las porcentajes del tipo modulo pertenecientes a un curso";
        $datos = [
            'titulo' => "Porcentajes por modulos $curso->nombre_curso, Nivel $curso->nivel ",
            'descripcion' => $descripcion,
            // 'modulosCurso' => $modulosCurso,
            'curso' => $curso,
            'porcentajesCurso' => $porcentajesCurso,
            // 'modulo' =>$modulo,
            // 'docente' => $docente,
            'tipoModulo' => $tipoModulo,
            'id_curso' => $id_curso
        ];
        $this->view('pages/porcentajesCurso/porcentajesCursoDetalle', $datos);
    }

    public function create(){
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
            $datos = [
                'id_porcentajes_curso' => null,
                'id_curso' => trim($_POST['id_curso']),
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
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
            $datos = [
                'id_porcentajes_curso' => trim($_POST['porid']),
                'id_curso' => trim($_POST['id_curso']),
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

    public function delete($id=null){
        $this->sessionActivaX();
        if(isset($id))
            {
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
        $this->sessionActivaX();
        $tipoModulo = $this->tipoModuloModel->findActivos();
        $curso = $this->cursoModel->findAll();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes de los Cursos",
            'descripcion' => $descripcion,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso,
        ];
        $this->view('pages/porcentajesCurso/porcentajes', $datos);
    }

    public function mostrarPorcentajesAdd($id_curso){
        $this->sessionActivaX();
        $tipoModulo = $this->tipoModuloModel->findActivos();
        $curso = $this->cursoModel->findById($id_curso);
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes de los Curso",
            'descripcion' => $descripcion,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso,
        ];
        $this->view('pages/porcentajesCurso/mostrarPorcentajesAdd', $datos);
    }

    public function mostrarPorcentajesEdit($id_curso){
        $this->sessionActivaX();
        $tipoModulo = $this->tipoModuloModel->findActivos();
        $curso = $this->cursoModel->findById($id_curso);
        $porcentajes = $this->porcentajesCursoModel->porcentajesTipoModulo($id_curso);
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes de los Curso",
            'descripcion' => $descripcion,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso,
            'porcentajes' => $porcentajes
        ];
        $this->view('pages/porcentajesCurso/mostrarPorcentajesEdit', $datos);
    }

    public function seleccionEdit(){
        $this->sessionActivaX();
        $cursoConPorcentaje = $this->cursoModel->cursoConPorcentaje();
        $datos = [
            'cursoConPorcentaje' => $cursoConPorcentaje
        ];
        $this->view('pages/porcentajesCurso/seleccionEdit', $datos);
    }

    public function seleccionAdd(){
        $this->sessionActivaX();
        $cursoConPorcentaje = $this->cursoModel->cursoSinPorcentaje();
        $datos = [
            'cursoSinPorcentaje' => $cursoConPorcentaje
        ];
        $this->view('pages/porcentajesCurso/seleccionAdd', $datos);
    }

    public function guardarPorcentajes(){
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {

            for ($i = 0; $i < sizeof($_POST['id_tipoModulo']); $i++) {
                $datos = [
                    'id_porcentajes_curso' => $_POST['id_porcentajes_curso'][$i],
                    'id_curso' => trim($_POST['id_curso_text']),
                    'id_tipo_modulo' => $_POST['id_tipoModulo'][$i],
                    'porcentaje' => $_POST['porcentajes_curso'][$i],
                    'observacion' => 'Creado'
                ];
//                var_dump($datos);
                if($this->porcentajesCursoModel->replace($datos)){
                    redireccionar('porcentajeCurso');
                }else{
                    die("Error al insertar los datos");
                }
            }
        }else{
            $this->index();
        }
    }

}