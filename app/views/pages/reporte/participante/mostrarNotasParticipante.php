<?php
/*Importacion de Header de la aplicacion*/
// require_once RUTA_APP . '/views/include/header.php';
require_once RUTA_APP . '/views/include/headerPadre.php';
?>

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">
                            <a href="<?php echo constant('RUTA_URL') ?>/reporte/cursosParticipante/">
                                <i class="fas fa-arrow-circle-left color-primary"></i>
                            </a>
                        <?php echo $datos['titulo'];  ?> &nbsp;</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Notas participante</li>

                        </ol>
                        
                        <div class="clearfix">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- Este es el deck -->
            <!-- <div class="card-deck"> -->
            <!-- Este es el deck -->

            <!-- El cuerpo de la vista -->
            <div class="row mx-4 mt-3 ">
        
        <?php if(empty($datos['matrizModulos'])){?>
                
            <h2 class="text-center">No existen registros</h2>

        <?php }else{
        $alumnos = 0;
        $suma =0;
        ?>

        <div class="table-responsive table-responsive-sm mx-3" style="text-align: center; width: 100%">
            <table class="table table-sm table-hover table-borderless">
                <thead class="thead bg-info-50">
                    <tr>
                        <!-- <th class="align-middle border border-dark"> MODULO</th> -->
                        <th rowspan="2" class="align-middle border border-dark">NOMBRE MODULO</th>
                        <th rowspan="2" class="align-middle border border-dark">TIPO MODULO</th>
                        <th colspan="6" class="align-middle border border-dark">ACTIVIDADES</th>
                        <th rowspan="2" class="align-middle border border-dark">PROMEDIO</th>
                    </tr>
                    <tr>
                        <th class="border border-dark">Actividad 1</th>
                        <th class="border border-dark">Actividad 2</th>
                        <th class="border border-dark">Actividad 3</th>
                        <th class="border border-dark">Actividad 4</th>
                        <th class="border border-dark">Actividad 5</th>
                        <th class="border border-dark">Actividad 6</th>
                    </tr>
                    
                </thead>
                <tbody class="">
                    <?php $c = 1; foreach ($datos['matrizModulos'] as $lista) { ?>
                        <tr class="border border-dark ">
                            <!-- <td class="border border-dark align-middle" rowspan="2"><?php echo $c?></td> -->
                            <td class="border border-dark align-middle"  rowspan="2">
                                <?php echo $lista[0]->nombre_modulo?>
                            </td>
                            <td rowspan="2" class="border border-dark align-middle">
                                <?php echo $lista[0]->tipo_modulo?>
                            </td>
                            <td class="border border-dark">
                                %<?php echo $lista[0]->evaluacion1?>
                            </td>
                            <td class="border border-dark">
                                <?php echo ($lista[0]->evaluacion2 == 0)?"":"%".$lista[0]->evaluacion2 ?>
                            </td>
                            <td class="border border-dark">
                                <?php echo ($lista[0]->evaluacion3 == 0)?"":"%".$lista[0]->evaluacion3 ?>
                            </td>
                            <td class="border border-dark">
                                <?php echo ($lista[0]->evaluacion4 == 0)?"":"%".$lista[0]->evaluacion4 ?>
                            </td>
                            <td class="border border-dark">
                                <?php echo ($lista[0]->evaluacion5 == 0)?"":"%".$lista[0]->evaluacion5 ?>
                            </td>
                            <td class="border border-dark ">
                                <?php echo ($lista[0]->evaluacion6 == 0)?"":"%".$lista[0]->evaluacion6 ?>
                            </td>
                            <td  rowspan="2" class="align-middle border border-dark">
                                <b><?php
                                echo promedioModulo($nota=[
                                    'evaluacion1' => $lista[0]->evaluacion1,
                                    'nota1' => $lista[0]->nota1,
                                    'evaluacion2' => $lista[0]->evaluacion2,
                                    'nota2' => $lista[0]->nota2,
                                    'evaluacion3' => $lista[0]->evaluacion3,
                                    'nota3' => $lista[0]->nota3,
                                    'evaluacion4' => $lista[0]->evaluacion4,
                                    'nota4' => $lista[0]->nota4,
                                    'evaluacion5' => $lista[0]->evaluacion5,
                                    'nota5' => $lista[0]->nota5,
                                    'evaluacion6' => $lista[0]->evaluacion6,
                                    'nota6' => $lista[0]->nota6,
                                ]);
                                ?></b>
                            </td>
                        </tr>
                        <tr class="border border-dark">
                                <td>
                                    <?php echo ($lista[0]->nota1 == null)?"":$lista[0]->nota1  ?>
                                </td>
                                <td>
                                    <?php echo ($lista[0]->nota2 == null)?"":$lista[0]->nota2  ?>
                                </td>
                                <td>
                                    <?php echo ($lista[0]->nota3 == null)?"":$lista[0]->nota3  ?>
                                </td>
                                <td>
                                    <?php echo ($lista[0]->nota4 == null)?"":$lista[0]->nota4  ?>
                                </td>
                                <td>
                                    <?php echo ($lista[0]->nota5 == null)?"":$lista[0]->nota5  ?>
                                </td>
                                <td>
                                    <?php echo ($lista[0]->nota6 == null)?"":$lista[0]->nota6  ?>
                                </td>
                                
                                
                            </tr>
                        <?php
                       
                        $c++;
                    } ?>
                        <tr class="border border-dark">
                            <td colspan="8" class="text-right"><b>PROMEDIO GENERAL DEL ALUMNO</b></td>
                            <td rowspan="2" class="align-middle text-center border border-dark" 
                                <?php $promedio = $datos['promedio']; 
                                    echo ($promedio['promedio']>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> >
                                <b><?php echo $promedio['promedio'] ?></b>
                            </td>
                        </tr>
                </tbody>
                    </table>
                </div>
        <?php } ?>
    </div>
            <!-- El cuerpo de la vista -->
               

        </div>
    </div>

<?php
/*Importacion de Footer de la aplicacion */
function promedioModulo($notas)
{
    if (!$notas) {
        return "Vacío";
    }
    $prom = 0;

    if ($notas['evaluacion1']) {
        $prom += $notas['nota1'] * ($notas['evaluacion1'] / 100);
    }
    if ($notas['evaluacion2']) {
        $prom += $notas['nota2'] * ($notas['evaluacion2'] / 100);
    }
    if ($notas['evaluacion3']) {
        $prom += $notas['nota3'] * ($notas['evaluacion3'] / 100);
    }
    if ($notas['evaluacion4']) {
        $prom += $notas['nota4'] * ($notas['evaluacion4'] / 100);
    }
    if ($notas['evaluacion5']) {
        $prom += $notas['nota5'] * ($notas['evaluacion5'] / 100);
    }
    if ($notas['evaluacion6']) {
        $prom += $notas['nota6'] * ($notas['evaluacion6'] / 100);
    }
   
    return round($prom, 2);
}

require_once RUTA_APP . '/views/include/footer.php';
?>