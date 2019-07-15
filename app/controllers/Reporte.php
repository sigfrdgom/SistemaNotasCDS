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
        // $nombres = array();
        // $n_participantes= $this->participanteModel->count();
        // $n_usuarios = $this->docenteModel->count();
        // $n_notas = $this->notaModel->count();
        // $n_cursos = $this->cursoModel->count();
        // $n_modulos = $this->moduloModel->count();
        // $descripcion = "";
        $datos = [
            'titulo' => "Reportes Sistema de Notas CDS",
            // 'descripcion' => $descripcion,
            // 'nombres' => $nombres,
            // 'n_participantes' => $n_participantes[0]->n_registros,
            // 'n_usuarios' => $n_usuarios[0]->n_registros,
            // 'n_notas' => $n_notas[0]->n_registros,
            // 'n_cursos' => $n_cursos[0]->n_registros,
            // 'n_modulos' => $n_modulos[0]->n_registros,
        ];

        $this->view('pages/reporte/reporteLista', $datos);
    }

    public function dsmpCohorte(){
        $datos = [
            'titulo' => "Reporte de desempeño por Cohorte",
        ];

        $this->view('pages/reporte/reporteDsmpCohorte', $datos);
    }

    public function dsmpNivel(){

        $curso = $this->cursoModel->findAll();

        $datos = [
            'titulo' => "Reportes de Desempeño por nivel",
            'curso' => $curso
        ];

        $this->view('pages/reporte/reporteNivel', $datos);
    }

    public function generarDsmpNivel($c,$n){
        $id_curso=trim($c);
        $nivel=trim($n);

        $infoCurso = $this->cursoModel->findById($id_curso);
        $tipoModulos = $this->tipoModuloModel->tipoModulosByCurso($id_curso);
        $participantes = $this->participanteModel->participanteCursoNivel($id_curso, $nivel);
        $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTop($id_curso, $nivel);

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
        $this->view('pages/reporte/reporteDsmpNivel', $datos);
    }

    public function generarDsmpParticipante($curso,$nivel,$participante){

        $modulos = $this->modulosCursoModel->modulosByCurso(trim($curso));
        $info = $this->cursoModel->findById(trim($curso));
        $alm = $this->participanteModel->findById($participante);

        $matrizModulos = array();
        foreach ($modulos as $modulo) {
            array_push($matrizModulos, $this->notaModel->findNotasByCursoModuloNivelParticipante($curso, $modulo->id_modulo, $nivel,$participante));
        }
        $datos = [
            'titulo' => "Reporte de desempeño Curso:  $info->nombre_curso , Nivel: $info->nivel",
            'info' => "Participante: ".ucwords(strtolower("$alm->nombres $alm->apellidos")),
            'modulos' => $modulos,
            'matrizModulos' => $matrizModulos,
            'sede' => $info->sede
        ];
        $this->view('pages/reporte/reporteDsmpParticipante', $datos);
        var_dump($matrizModulos[0]);
        echo "".$curso;
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


    public function dsmpParticipanteCohorte(){
        $curso = $this->cursoModel->findByCohorte();

        $datos = [
            'titulo' => "Reportes de Desempeño por estudiante",
            'curso' => $curso
        ];

        $this->view('pages/reporte/reporteParticipanteCohorte', $datos);
    }

    public function dsmpParticipanteNivel($cohorte){
        $curso = $this->cursoModel->findByNivel($cohorte);
        $descripcion = "Reportes de Desempeño por estudiante";
        $datos = [
            'titulo' => "Niveles ".$curso[0]->cohorte,
            'descripcion' => $descripcion,
            'curso' => $curso 
        ];  
        $this->view('pages/reporte/reporteParticipanteNivel', $datos);
    }

    public function dsmpParticipante($id_curso){
        $matricula = $this->matriculaModel->findForTableCurso($id_curso);
        $participante = $this->participanteModel->findAll();
        $curso = $this->cursoModel->findById($id_curso);
        
        // $descripcion = "Vista que muestra todos las cursos con  matriculas que existen";
        $datos = [
            'titulo' => "Participantes matriculados en $curso->cohorte, $curso->nombre_curso nivel $curso->nivel ",
            
            'matricula' => $matricula,
            'participante' => $participante ,
            'curso' => $curso ,
            'id_curso' => $id_curso,
            'sede' => $curso->sede
        ];
        $this->view('pages/reporte/listaParticipantes', $datos);
    }
}