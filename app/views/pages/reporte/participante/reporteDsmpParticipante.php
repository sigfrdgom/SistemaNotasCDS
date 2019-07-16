<!DOCTYPE html>
<html lang="es-sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte desempeño nivel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/img/icons/test.png">

    <!-- Bootstrap CSS -->
    <link href="<?php echo RUTA_URL ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet"  />

    <!-- Custom CSS -->
    <link href="<?php echo RUTA_URL ?>/assets/css/style.css" rel="stylesheet"  />
    
    <!-- CSS General para la pagina-->
    <link href="<?php echo RUTA_URL ?>/css/general.css" rel="stylesheet" >

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
    <!-- END CSS for this page -->

    <!-- Other CSS -->
    <link href="<?php echo RUTA_URL ?>/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://kit.fontawesome.com/3b0ecff6a4.js"></script>
</head>
<body class="bg-white">


<!-- Start content -->
<div class="content mt-5 ">
    <div class="container-fluid">

    <!-- Header del reporte -->
    <div class="row my-3">
        <div class="col-3 text-left">
            <img alt="Logo" class="img-logo mt-3" style="border-radius: 3px; width: 100%" src="<?php echo RUTA_URL ?>/img/logo/usaid-es-hd.png" />
        </div>
        <div class="text-center mt-3 col">
            <p style="font-size: 1.5em; font-weight: bold">
                PROYECTO PUENTES PARA EL EMPLEO <br>
                FUNDACIÓN GLORIA DE KRIETE <br>
                CENTRO DE DESARROLLO DE SOFTWARE <br>
                SEDE <?php echo $datos['sede']?>
            </p>
            
        </div>
        <div class="col-2 text-right mr-5">
            <img alt="Logo" class="img-logo" style="border-radius: 3px; width: 55%" src="<?php echo RUTA_URL ?>/img/logo/fgk.png" />
        </div>
    </div>
    
    <!-- El cuerpo del reporte -->
    <div class="row mx-4 mt-5 ">
        
        <?php if(empty($datos['matrizModulos'])){?>
                
            <h2 class="text-center">No existen registros</h2>

        <?php }else{
        $alumnos = 0;
        $suma =0;
        ?>
        <!-- Titulo del reporte -->
        <div class="text-center mt-0 mb-3" style="text-align: center; width: 100%">
            <h5 ><?php echo $datos['titulo']?></h5>
            <h6><?php echo $datos['info']?></h6>
        </div>

        <div class="table-responsive table-responsive-md mx-3" style="text-align: center; width: 100%">
            <table class="table table-sm table-hover table-borderless">
                <thead class="thead bg-info-50">
                    <tr>
                        <!-- <th class="align-middle border border-dark"> MODULO</th> -->
                        <th rowspan="2" class="align-middle border border-dark">NOMBRE MODULO</th>
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
                        <tr class="border border-dark font-weight-bold">
                            <!-- <td class="border border-dark align-middle" rowspan="2"><?php echo $c?></td> -->
                            <td class="border border-dark align-middle"  rowspan="2">
                                <?php echo $lista[0]->nombre_modulo?>
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
                            <td colspan="7" class="text-right"><b>PROMEDIO GENERAL DEL ALUMNO</b></td>
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
    
<br>
    <!-- Footer del reporte -->
    <div class=" mx-5">
        <div class="text-center mt-3 col">
            <p class="font-weight-bold">
                Impreso en <?php echo  ucwords(strtolower($datos['sede']))?> el dia  <?php echo date("d")?> del mes
                <?php echo date('m')?> del año <?php echo date("Y")?>
            </p>
        </div>
    </div>

</body>
</html>
<?php
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
?>