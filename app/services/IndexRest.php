<?php

class IndexRest extends GenericAPI
{
    public function __construct()
    {
        $this->url = constant('RUTA_URL') . "/IndexRest";
        $this->notaModel = $this->model('NotaModel');
        $this->modulosCursoModel = $this->model('ModulosCursoModel');
        $this->participanteModel = $this->model('ParticipanteModel');
        $this->cursoModel = $this->model('CursoModel');
        $this->moduloModel = $this->model('ModuloModel');
        $this->nivelCursoModel = $this->model('NivelCursoModel');
        $this->porcetanjesCursoModel = $this->model('PorcentajesCursoModel');
        $this->tipoModuloModel = $this->model('TipoModuloModel');
    }

    public function grafica(){
        //Comprueba que la peticion ha sido enviada por GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            try {

                $cursos = $this->cursoModel->cursoLast(10);

                $cursosArray= array();
                $promediosArray = array();

                if(isset($cursos)) {
                    foreach ($cursos as $cursoActual) {

                        $tipoModulos = $this->tipoModuloModel->tipoModulosByCurso($cursoActual->id_curso);
                        $participantes = $this->participanteModel->participanteCursoNivel($cursoActual->id_curso);
                        $notas = $this->notaModel->findNotasByCursoPorcenatejeNivelTop($cursoActual->id_curso);

                        $suma = 0;
                        $contProm = 0;
                        $promedios = array();
                        $total = 0;
                        $totalProm = array();
                        $porcentaje = 0;
                        $estudiantes = array();

                        if (sizeof($participantes) > 0) {
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

                            $promedio = 0;
                            foreach ($totalProm as $prom) {
                                $promedio += $prom;
                            }
                            $promedio = round($promedio / sizeof($totalProm), 2);

                            array_push($cursosArray, $cursoActual->nombre_curso . " Nivel " . $cursoActual->nivel);
                            array_push($promediosArray, $promedio);
                        }
                        unset($participantes);
                        unset($notas);
                    }
                }

                $arreglo = [
                    'cursos' => $cursosArray,
                    'promedios' => $promediosArray
                ];

                echo json_encode($arreglo);
                unset($arreglo);

                //Manda un estatus 200 que la peticion fue correcta
                return http_response_code(200);
            } catch (Exception $e) {
                //Manda un estatus 503 diciendo que algo salio mal en el servidor
                http_response_code(503);
            }
        } else {
            // Mostrar codigo de respuesta - 400 bad request
            http_response_code(400);

            // Mostrar mensaje
            echo json_encode(array("Mensaje" => "Error! Realizo una peticion incorrecta al servidor"));
        }
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