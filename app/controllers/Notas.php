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

    public function create($id_curso, $id_modulo)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id_nota' => $_POST['id_nota'],
                'id_participante' => $_POST['id_participante'],
                'nota1' => $_POST['nota1'],
                'nota1' => $_POST['nota1'],
                'nota2' => $_POST['nota2'],
                'nota3' => $_POST['nota3'],
                'nota4' => $_POST['nota4'],
                'nota5' => $_POST['nota5'],
                'nota6' => $_POST['nota6'],
                'observaciones' => $_POST['observaciones'],
            ];

            $modulo_curso = $this->modulosCursoModel->findByCursoModulo($id_curso, $id_modulo);
            var_dump($modulo_curso);

            for ($i = 0; $i < sizeof($datos); $i++) {
                $entity = [
                    'id_participante' => $datos['id_participante'][$i],
                    'id_modulos_curso' => $modulo_curso['id_modulos_curso'],
                    'nota1' => $datos['nota1'][$i],
                    'nota2' => $datos['nota2'][$i],
                    'nota3' => $datos['nota3'][$i],
                    'nota4' => $datos['nota4'][$i],
                    'nota5' => $datos['nota5'][$i],
                    'nota6' => $datos['nota6'][$i],
                    'observaciones' => $datos['observaciones'][$i],
                ];

                if($this->notaModel->create($entity)){
                    //redireccionar('tipoModulo');
                }else{
                    die("Error al insertar los datos");
                }
            }

                /*
                if($this->notaModel->create($valores)){
                    redireccionar('tipoModulo');
                }else{
                    die("Error al insertar los datos");
                }
                */
            /*

        }else{
            $datos = [
                'nombre' => '',
                'estado' => ''
            ];
            $this->view('pages/tipoModulo', $datos);
                    */
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