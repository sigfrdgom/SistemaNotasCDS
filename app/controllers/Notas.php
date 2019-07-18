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
        $this->sessionActivaXD();
        $descripcion = "Vista que muestra todos los cursos";
        // $cursos = $this->cursoModel->orderByFechaDesc();
        $cursos = $this->cursoModel->orderByCohorteNivel();
        $datos = [
            'titulo' => "Mostrar Cursos",
            'descripcion' => $descripcion,
            'cursos' => $cursos,
        ];
        $this->view('pages/notas/mostrarCurso', $datos);
    }

    public function notas()
    {
        $this->sessionActivaXD();
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

    public function modulos($idCurso)
    {
        $this->sessionActivaXD();
        $descripcion = "Vista que muestra todos los Modulos del curso";
        $modulos = $this->moduloModel->findbyIdCurso($idCurso);
        $datos = [
            'titulo' => "Modulos del curso",
            'descripcion' => $descripcion,
            'modulos' => $modulos,
            'id_curso' => trim($idCurso)
        ];
        $this->view('pages/notas/mostrarModulos', $datos);
    }

    public function calificaciones($id_curso, $id_modulo)
    {
        $this->sessionActivaXD();
        $datos = [
            'id_curso' => trim($id_curso),
            'id_modulo' => trim($id_modulo),
            'nivel' => trim(1)

        ];
        $descripcion = "Vista que manera de ingregar notas";
        $participantes = $this->notaModel->findNotasEstudiantes($datos);
        $datos = [
            'titulo' => "Calificaciones",
            'descripcion' => $descripcion,
            'participantes' => $participantes,
            'id_curso' => $datos['id_curso'],
            'id_modulo' => $datos['id_modulo']
        ];
        $this->view('pages/notas/mostrarCalificaciones', $datos);
    }

    public function ingresarNotas($id_curso, $id_modulo)
    {
        $this->sessionActivaXD();
        $datos = [
            'id_curso' => trim($id_curso),
            'id_modulo' => trim($id_modulo),
        ];
        $descripcion = "Vista que manera de ingregar notas";
        $participantes = $this->notaModel->findNotasEstudiantes($datos);
        $datos = [
            'titulo' => "Calificaciones",
            'descripcion' => $descripcion,
            'participantes' => $participantes,
            'id_curso' => $id_curso,
            'id_modulo' => $id_modulo
        ];
        $this->view('pages/notas/calificaciones', $datos);
    }

    public function create()
    {
        $this->sessionActivaXD();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id_nota' => $_POST['id_nota'],
                'id_participante' => $_POST['id_participante'],
                'id_modulos_curso' => $_POST['id_modulos_curso'],
                'nota1' => $_POST['nota1'],
                'nota1' => $_POST['nota1'],
                'nota2' => $_POST['nota2'],
                'nota3' => $_POST['nota3'],
                'nota4' => $_POST['nota4'],
                'nota5' => $_POST['nota5'],
                'nota6' => $_POST['nota6'],
                'observaciones' => $_POST['observaciones'],
                'id_curso' => trim($_POST['id_curso']),
                'id_modulo' => trim($_POST['id_modulo'])
            ];

            for ($i = 0; $i < sizeof($datos); $i++) {
                $entity = [
                    'id_nota' => $datos['id_nota'][$i],
                    'id_participante' => $datos['id_participante'][$i],
                    'id_modulos_curso' => $datos['id_modulos_curso'][$i],
                    'nota1' => $datos['nota1'][$i],
                    'nota2' => $datos['nota2'][$i],
                    'nota3' => $datos['nota3'][$i],
                    'nota4' => $datos['nota4'][$i],
                    'nota5' => $datos['nota5'][$i],
                    'nota6' => $datos['nota6'][$i],
                    'observaciones' => $datos['observaciones'][$i],
                ];

                if ($this->notaModel->replace($entity)) {
                    redireccionar('notas/calificaciones/' . $datos['id_curso'] . '/' . $datos['id_modulo']);
                } else {
                    die("Error al insertar los datos");
                }
            }

        }
    }

    public function buscarNotas(){
        $this->sessionActivaXD();
        $id_modulo = $_POST['id_modulo'];
        $id_curso = $_POST['id_curso'];
        $busqueda = $_POST['busqueda'];

        $datos = [
            'id_curso' => trim($id_curso),
            'id_modulo' => trim($id_modulo)
        ];

        if($busqueda == null || $busqueda== ""){
            $notas = $this->notaModel->findNotasEstudiantes($datos);
        }else{
            $notas = $this->notaModel->findByParticipante($id_curso, $id_modulo, $busqueda);
        }
        $datos = [
            'notas' => $notas,
        ];
        $this->view('pages/notas/buscarNotas', $datos);
    }

}