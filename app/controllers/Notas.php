<?php

class Notas extends Controller
{
    public function __construct()
    {
        //Cargar Modelos de la paginas;
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
    }

    public function index()
    {
        $descripcion = "Vista que muestra todos los cursos";
        $cursos = $this->cursoModel->orderByFechaDesc();
        $datos = [
            'titulo' => "Mostrar Cursos",
            'descripcion' => $descripcion,
            'cursos' => $cursos,
        ];
        $this->view('pages/notas/mostrarCurso', $datos);
    }

    public function modulos($idCurso)
    {
        $descripcion = "Vista que muestra todos los Modulos del curso";
        $modulos = $this->moduloModel->findbyIdCurso($idCurso);
        $datos = [
            'titulo' => "Modulos del curso",
            'descripcion' => $descripcion,
            'modulos' => $modulos,
            'id_curso' => $idCurso
        ];
        $this->view('pages/notas/mostrarModulos', $datos);
    }

    public function calificaciones()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id_curso' => trim($_POST['id_curso']),
                'id_modulo' => trim($_POST['id_modulo'])
            ];
            $descripcion = "Vista que manera de ingregar notas";
            $participantes = $this->participanteModel->participantesByModulo($datos);
            $datos = [
                'titulo' => "Calificaciones",
                'descripcion' => $descripcion,
                'participantes' => $participantes,
                'id_curso' => $datos['id_curso'],
                'id_modulo' => $datos['id_modulo']
            ];
            $this->view('pages/notas/mostrarCalificaciones', $datos);
        }
    }

    public function ingresarNotas($param1, $param2)
    {
            $datos = [
                'id_curso' => $param1,
                'id_modulo' => $param2
            ];
            $descripcion = "Vista que manera de ingregar notas";
            $participantes = $this->participanteModel->participantesByModulo($datos);
            $datos = [
                'titulo' => "Calificaciones",
                'descripcion' => $descripcion,
                'participantes' => $participantes,
                'id_curso' => $param1,
                'id_modulo' => $param2
            ];
            $this->view('pages/notas/calificaciones', $datos);
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){


            $datos = [
                'nota1' => trim($_POST['nota1']),
                'nota2' => trim($_POST['nota2']),
                'nota3' => trim($_POST['nota3']),
                'nota4' => trim($_POST['nota4']),
                'nota5' => trim($_POST['nota5']),
                'nota6' => trim($_POST['nota6']),
                'observaciones' => trim($_POST['observaciones']),
            ];
            if($this->notaModel->create($datos)){
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



    public function notas()
    {
        $nota = $this->notaModel->findAll();
        $modulosCurso = $this->modulosCursoModel->findAll();
        $participante = $this->participanteModel->findAll();

        $descripcion = "Vista que muestra todos las notas que existen";
        $datos = [
            'titulo' => "Nota",
            'descripcion' => $descripcion,
            'nota' => $nota,
            'moduloCurso' => $modulosCurso,
            'participante' => $participante
        ];
        $this->view('pages/notas/nota', $datos);
    }


}