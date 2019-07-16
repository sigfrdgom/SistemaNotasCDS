<?php
class Reporte extends Controller
{
    public function __construct() {
        //Cargar Modelos de la paginas;
        $this->cursoModel = $this->model('CursoModel');
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
        $this->porcetanjesCursoModel = $this->model('PorcentajesCursoModel');
        $this->tipoModuloModel = $this->model('TipoModuloModel');
        $this->matriculaModel = $this->model('MatriculaModel');
        
    }

    /*Vista Principal*/
    public function index(){
        $datos = [
            'titulo' => "Reportes Sistema de Notas CDS",
        ];
        $this->view('pages/reporte/reporteLista', $datos);
    }

    // Para desempeño del cohorte
    public function dsmpCohorte()
    {
        $datos = [
            'titulo' => "Reporte de desempeño por Cohorte",
        ];

        $this->view('pages/reporte/reporteDsmpCohorte', $datos);
    }


    // Reporte de desempeño por nivel muestra los cursos disponibles para generar un reporte
    public function dsmpNivel()
    {
        $curso = $this->cursoModel->findAll();
        $datos = [
            'titulo' => "Reportes de Desempeño por nivel",
            'curso' => $curso
        ];
        $this->view('pages/reporte/nivel/reporteNivel', $datos);
    }


    // El metodo para generar el reporte por nivel de un cohorte
    public function generarDsmpNivel($c,$n,$p=null)
    {
        $id_curso=trim($c);
        $nivel=trim($n);
        $id_participante=trim($p);

        $infoCurso = $this->cursoModel->findById($id_curso);
        $tipoModulos = $this->tipoModuloModel->tipoModulosByCurso($id_curso);
        $participantes = $this->participanteModel->participanteCursoNivel($id_curso, $nivel);
        
        if($p == null){
            $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTop($id_curso, $nivel);
        }else{
            $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTopParticipante($id_curso, $nivel,$id_participante);
        }
        

        $suma = 0;
        $contProm = 0;
        $promedios = array();
        $total = 0;
        $totalProm = array();
        $porcentaje = 0;
        $listaParticipante = array();
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
                unset($estudiantes[$clave]);
                unset($promedios[$clave]);
                unset($totalProm[$clave]);
                unset($arreglo);
            }
        }
        unset($participantes);
        unset($notas);
        $datos = [
            'titulo' => "Reporte de desempeño $infoCurso->cohorte",
            'info' => "Curso:  $infoCurso->nombre_curso , Nivel: $infoCurso->nivel",
            'sede' => $infoCurso->sede ,
            'tipoModulos' => $tipoModulos,
            'lista' => $listaParticipante
        ];
        $this->view('pages/reporte/nivel/reporteDsmpNivel', $datos);
    }


    // El metodo para generar el reporte por nivel de un cohorte
    public function generarDsmpParticipante($curso,$nivel,$participante)
    {

        $modulos = $this->modulosCursoModel->modulosByCurso(trim($curso));
        $info = $this->cursoModel->findById(trim($curso));
        $alm = $this->participanteModel->findById($participante);

        $matrizModulos = array();
        foreach ($modulos as $modulo) {
            array_push($matrizModulos, $this->notaModel->findNotasByCursoModuloNivelParticipante($curso, $modulo->id_modulo, $nivel,$participante));
        }

        $promedio = $this->generarDsmpNivelProm($curso,$nivel,$participante);
        $datos = [
            'titulo' => "Reporte de desempeño Curso:  $info->nombre_curso , Nivel: $info->nivel",
            'info' => "Participante: ".ucwords(strtolower("$alm->nombres $alm->apellidos")),
            'modulos' => $modulos,
            'matrizModulos' => $matrizModulos,
            'sede' => $info->sede,
            'promedio' => $promedio
        ];
        $this->view('pages/reporte/participante/reporteDsmpParticipante', $datos);
    }


    // Para obtener los promedios de los modulos
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


    // Muestra los cohortes disponibles
    public function dsmpParticipanteCohorte()
    {
        $curso = $this->cursoModel->findByCohorte();
        $datos = [
            'titulo' => "Reportes de Desempeño por estudiante",
            'curso' => $curso
        ];
        $this->view('pages/reporte/participante/reporteParticipanteCohorte', $datos);
    }


    // Muestra los niveles disponibles por cohorte
    public function dsmpParticipanteNivel($cohorte)
    {
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Reportes de Desempeño por estudiante";
        $datos = [
            'titulo' => "Niveles ".$curso[0]->cohorte,
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];  
        $this->view('pages/reporte/participante/reporteParticipanteNivel', $datos);
    }


    // Muestra la lista de participantes inscritos en un Cohorte por curso por nivel especifico (matricula)
    public function dsmpParticipante($id_curso)
    {
        $matricula = $this->matriculaModel->findForTableCurso($id_curso);
        $curso = $this->cursoModel->findById($id_curso);
        
        $datos = [
            'titulo' => "Participantes del $curso->cohorte, $curso->nombre_curso nivel $curso->nivel ",        
            'matricula' => $matricula,
            'curso' => $curso ,
            'id_curso' => $id_curso,
            'sede' => $curso->sede
        ];
        $this->view('pages/reporte/participante/listaParticipantes', $datos);
    }

    //  Para calcular el promedio por curso y nivel de un alumno en especificos
    public function generarDsmpNivelProm($c,$n,$p)
    {
        $id_curso=trim($c);
        $nivel=trim($n);
        $id_participante=trim($p);

        $tipoModulos = $this->tipoModuloModel->tipoModulosByCurso($id_curso);
        $participantes = $this->participanteModel->findById($id_participante);
        $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTopParticipante($id_curso, $nivel,$id_participante);
    
        $suma = 0;
        $contProm = 0;
        $promedios = array();
        $total = 0;
        $totalProm = array();
        $porcentaje = 0;
        $listaParticipante = array();
        $estudiantes = array();

        
        // if(sizeof($participantes)>0) {
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
                    'promedio' => $totalProm[$clave]
                ];
                
                array_push($listaParticipante, $arreglo);
                unset($estudiantes[$clave]);
                unset($promedios[$clave]);
                unset($totalProm[$clave]);
            }
        // }
        unset($participantes);
        unset($notas);
        return $arreglo;
        unset($arreglo);
    }
}