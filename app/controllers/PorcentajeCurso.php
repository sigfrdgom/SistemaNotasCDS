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
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/porcentajesCurso/porcentajesCursoDetalle', $datos);
    }

    public function create(){
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
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
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {
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
        $cursoSinPorcentaje = $this->cursoModel->cursoSinPorcentaje();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "Porcentajes de los Cursos",
            'descripcion' => $descripcion,
            'tipoModulo' => $tipoModulo,
            'curso' => $curso,
            'cursoSinPorcentaje' => $cursoSinPorcentaje
        ];
        $this->view('pages/porcentajesCurso/porcentajes', $datos);
    }

    public function mostrarPorcentajes($id_curso = null){
        $this->sessionActivaX();
        if(isset($id_curso))
            {
                $tipoModulo = $this->tipoModuloModel->findActivos();
                $curso = $this->cursoModel->findById($id_curso);
                $cursoSinPorcentaje = $this->cursoModel->cursoSinPorcentaje();
                $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
                $datos = [
                    'titulo' => "Porcentajes de los Curso",
                    'descripcion' => $descripcion,
                    'tipoModulo' => $tipoModulo,
                    'curso' => $curso,
                    'cursoSinPorcentaje' => $cursoSinPorcentaje
                ];
                $this->view('pages/porcentajesCurso/mostrarPorcentajes', $datos);
            
            }else{
                $this->view('pages/porcentajesCurso/mostrarPorcentajes', $datos);
        die("Error al buscar el dato");
        
        }

    }

    public function guardarPorcentajes(){
        $this->sessionActivaX();
        if (($_SERVER['REQUEST_METHOD'] == 'POST'))
        {

            for ($i = 0; $i < sizeof($_POST['id_tipoModulo']); $i++) {
                $datos = [
                    'id_porcentaje_curso' => null,
                    'id_curso' => trim($_POST['id_curso_text']),
                    'id_tipo_modulo' => $_POST['id_tipoModulo'][$i],
                    'porcentaje' => $_POST['porcentajes_curso'][$i],
                    'observacion' => 'Creado'
                ];
                //var_dump($datos);
                if($this->porcentajesCursoModel->create($datos)){
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