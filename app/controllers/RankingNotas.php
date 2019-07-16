<?php

class RankingNotas extends Controller
{
    public function __construct()
    {
        //Cargar Modelos de la paginas;
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
        $this->porcetanjesCursoModel = $this->model('PorcentajesCursoModel');
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    public function index()
    {
        $descripcion = "Vista que muestra todos los cursos";
        $cursos = $this->cursoModel->orderByCohorteNivel();
        $datos = [
            'titulo' => "Mostrar Cursos",
            'descripcion' => $descripcion,
            'cursos' => $cursos,
        ];
        $this->view('pages/ranking/mostrarCurso', $datos);
    }

    public function nivel($idCurso)
    {
        $nivel = $this->nivelCursoModel->findNivelByCurso($idCurso);
        $datos = [
            'titulo' => "Niveles del Curso",
            'nivel' => $nivel,
            'id_curso' => trim($idCurso)
        ];
        $this->view('pages/ranking/mostrarNivel', $datos);
    }

    public function promedioModulos()
    {
        $datos = [
            'id_curso' => trim($_POST['id_curso']),
            'nivel' => trim($_POST['nivel'])
        ];

        $modulos = $this->modulosCursoModel->modulosByCurso($datos['id_curso']);

        $matrizModulos = array();
        foreach ($modulos as $modulo) {
            array_push($matrizModulos, $this->notaModel->findNotasByCursoModuloNivel($datos['id_curso'], $modulo->id_modulo, $datos['nivel']));
        }
        $datos = [
            'titulo' => "Promedio de Modulos",
            'modulos' => $modulos,
            'matrizModulos' => $matrizModulos
        ];
        $this->view('pages/ranking/promedioModulos', $datos);
    }

    public function seleccion()
    {
        $datos = [
            'id_curso' => trim($_POST['id_curso']),
            'nivel' => trim($_POST['nivel']),
            'titulo' => "Seleccion",
        ];
        $this->view('pages/ranking/seleccion', $datos);
    }

    public function rankingTop()
    {
        $this->sessionActivaX();
        $datos = [
            'id_curso' => trim($_POST['id_curso']),
            'nivel' => trim($_POST['nivel'])
        ];

        $tipoModulos = $this->tipoModuloModel->tipoModulosByCurso($datos['id_curso']);
        $participantes = $this->participanteModel->participanteCursoNivel($datos['id_curso'], $datos['nivel']);
        $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTop($datos['id_curso'], $datos['nivel']);

        $suma = 0;
        $contProm = 0;
        $promedios = array();
        $total = 0;
        $totalProm = array();
        $porcentaje = 0;
        $listaParticipante = array();
        // var_dump($notas);
        $estudiantes = array();
        if(sizeof($participantes)>0) {
            foreach ($participantes as $participantes) {
                array_push($estudiantes, $participantes->nombres . " " . $participantes->apellidos);
                foreach ($tipoModulos as $tipoModulo) {
                    foreach ($notas as $nota) {
                        if ($tipoModulo->tipo_modulo == $nota->id_tipo_modulo &&
                            $participantes->id_participante == $nota->id_participante) {
                            $contProm++;
                            $suma += $this->promedioModulo($nota);
                            $porcentaje = $nota->porcentaje;
                        }
                    }
                    if ($contProm == 0) {
                        $contProm = 1;
                    }
                    $suma = round($suma / $contProm, 2);
                    array_push($promedios, $suma);

                    $total += $suma * ($porcentaje / 100);
                    $contProm = 0;
                    $suma = 0;
                    $porcentaje = 0;
                }
                array_push($totalProm, round($total, 2));
                $total = 0;
            }
            $promedios = array_chunk($promedios, sizeof($tipoModulos));


            while (sizeof($totalProm) != 0) {
                $mayor = 0;
                $clave = 0;
                foreach ($totalProm as $key => $valor) {
                    if ($valor > $mayor) {
                        $mayor = $valor;
                        $clave = $key;
                    }
                }
                
                $arreglo = [
                    'participante' => $estudiantes[$clave],
                    'tipoModulo' => $promedios[$clave],
                    'promedio' => $totalProm[$clave]
                ];
                array_push($listaParticipante, $arreglo);
                array_splice($estudiantes, $clave, 1);
                array_splice($promedios, $clave, 1);
                array_splice($totalProm, $clave, 1);
                unset($arreglo);
            }
        }
        unset($participantes);
        unset($notas);

        $datos = [
            'titulo' => "Ranking de Notas",
            'tipoModulos' => $tipoModulos,
            'lista' => $listaParticipante
        ];
        $this->view('pages/ranking/rankingtop', $datos);
    }

    private function promedioModulo($notas)
    {
        if (!$notas) {
            return "Vacío";
        }
        $prom = 0;

        if ($notas->evaluacion1) {
            $prom += $notas->nota1 * ($notas->evaluacion1 / 100);
        }
        if ($notas->evaluacion2) {
            $prom += $notas->nota2 * ($notas->evaluacion2 / 100);
        }
        if ($notas->evaluacion3) {
            $prom += $notas->nota3 * ($notas->evaluacion3 / 100);
        }
        if ($notas->evaluacion4) {
            $prom += $notas->nota4 * ($notas->evaluacion4 / 100);
        }
        if ($notas->evaluacion5) {
            $prom += $notas->nota5 * ($notas->evaluacion5 / 100);
        }
        if ($notas->evaluacion6) {
            $prom += $notas->nota6 * ($notas->evaluacion6 / 100);
        }
        return round($prom, 2);
    }


}