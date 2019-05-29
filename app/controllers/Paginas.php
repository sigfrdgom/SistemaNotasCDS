<?php
class Paginas extends Controller{
    
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->tipoModuloModel = $this->model('TipoModuloModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->docenteModel = $this->model('DocenteModel');
        $this->matriculaModel = $this->model('MatriculaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->notaModel = $this->model('NotaModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->porcentajesCursoModel = $this->model('PorcentajesCursoModel');
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

    /*Vista de Vista de Tipo Modulo*/
    public function tipoModulo(){
        $tipoModulo = $this->tipoModuloModel->findAll();
        $descripcion = "Vista que muestra todos los tipos de modulos que existen";
        $datos = [
            'titulo' => "Tipo Modulo",
            'descripcion' => $descripcion,
            'tipoModulo' => $tipoModulo
        ];
        $this->view('pages/tipoModulo', $datos);
    }

    public function modulo(){
        $modulo = $this->moduloModel->findAll();
        $descripcion = "Vista que muestra todos los modulos que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulo' => $modulo
        ];
        $this->view('pages/modulo', $datos);
    }

    public function curso(){
        $curso = $this->cursoModel->findAll();
        $descripcion = "Vista que muestra todos los cursos que existen";
        $datos = [
            'titulo' => "Curso",
            'descripcion' => $descripcion,
            'curso' => $curso
        ];
        $this->view('pages/curso', $datos);
    }

    public function docente(){
        $docente = $this->docenteModel->findAll();
        $descripcion = "Vista que muestra todos los docentes que existen";
        $datos = [
            'titulo' => "Docente",
            'descripcion' => $descripcion,
            'docente' => $docente
        ];
        $this->view('pages/docente', $datos);
    }

    public function matricula(){
        $matricula = $this->matriculaModel->findAll();
        $descripcion = "Vista que muestra todos las matriculas que existen";
        $datos = [
            'titulo' => "Matricula",
            'descripcion' => $descripcion,
            'matricula' => $matricula
        ];
        $this->view('pages/matricula', $datos);
    }

    public function modulosCurso(){
        $modulosCurso = $this->modulosCursoModel->findAll();
        $descripcion = "Vista que muestra todos los modulosCurso que existen";
        $datos = [
            'titulo' => "Modulo",
            'descripcion' => $descripcion,
            'modulosCurso' => $modulosCurso
        ];
        $this->view('pages/modulosCurso', $datos);
    }

    public function nota(){
        $nota = $this->notaModel->findAll();
        $descripcion = "Vista que muestra todos las notas que existen";
        $datos = [
            'titulo' => "Nota",
            'descripcion' => $descripcion,
            'nota' => $nota
        ];
        $this->view('pages/nota', $datos);
    }

    public function participante(){
        $participante = $this->participanteModel->findAll();
        $descripcion = "Vista que muestra todos las participantes que existen";
        $datos = [
            'titulo' => "participante",
            'descripcion' => $descripcion,
            'participante' => $participante
        ];
        $this->view('pages/participante', $datos);
    }

    public function porcentajesCurso(){
        $porcentajesCurso = $this->porcentajesCursoModel->findAll();
        $descripcion = "Vista que muestra todos las porcentajesCursos que existen";
        $datos = [
            'titulo' => "porcentajesCurso",
            'descripcion' => $descripcion,
            'porcentajesCurso' => $porcentajesCurso
        ];
        $this->view('pages/porcentajesCurso', $datos);
    }

    /*Ejemplo de envio de parametros*/
    public function actualizar($num_registros){
        echo $num_registros;
    }
}

?>
