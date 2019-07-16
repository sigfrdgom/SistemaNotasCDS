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
<body class="bg-white text-center" >
    
<div class="bg-dark" id="imprimir">
    <button class="btn btn-info font-weigth-bold my-3" onclick="window.print();" ><i class="fa fa-print" aria-hidden="true" style="font-size: 1.5em"></i> <b class="mb-5">Imprimir reporte PDF</b> </button>
</div>



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
    
    <div class="row mx-4 mt-5 ">
        
        <?php if(empty($datos['tipoModulos'])){?>
                
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

        <div class="table-responsive table-responsive-xl mx-3" style="text-align: center; width: 100%">
            <table class="table table-md table-hover table-borderless">
                <thead class="thead bg-info-50">
                    <tr>
                        <th rowspan="2" class="align-middle border border-dark">TOP</th>
                        <th rowspan="2" class="align-middle border border-dark">PARTICIPANTE</th>
                        <th colspan="<?php echo count($datos['tipoModulos'])?>" class="border border-dark">TIPOS DE MODULO</th>
                        <th rowspan="2" class="align-middle border border-dark">PROMEDIO FINAL</th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($datos['tipoModulos'] as $tipoModulo) {
                            ?>
                            <th class="border border-dark"><?php echo $tipoModulo->nombre ?> (<?php echo $tipoModulo->porcentaje ?>%)</th>
                            <?php
                        }
                        ?>
                        
                    </tr>
                </thead>
                <tbody class="">
                    <?php $c = 1; foreach ($datos['lista'] as $lista) { ?>
                        <tr class="border border-dark">
                            <td class="text-center"><?php echo $c ?></td>
                            <td ><?php echo $lista['participante'] ?></td>
                            <?php foreach ($lista['tipoModulo'] as $tipoModulo) {
                                ?>
                                <td class="text-center" <?php echo ($tipoModulo>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> ><?php echo $tipoModulo ?></td>
                                <?php
                            } ?>
                            <td class="text-center border border-dark" <?php echo ($lista['promedio']>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> ><?php echo "<b>".$lista['promedio']."</b>" ?></td>
                        </tr>
                        <?php
                        $suma += $lista['promedio'];
                        $alumnos++;
                        $c++;
                    } ?>
                        <tr class="border border-dark">
                            <td colspan="<?php echo count($datos['tipoModulos']) + 2 ?>" class="text-right"><b>PROMEDIO GENERAL DEL CURSO</b></td>
                            <td rowspan="2" class="align-middle text-center border border-dark" 
                                <?php $promedio = round(($suma/ $alumnos), 2); 
                                    echo ($promedio>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> >
                                <b><?php echo $promedio ?></b>
                            </td>
                        </tr>
                </tbody>
                    </table>
                </div>
        <?php } ?>
    </div>
    
    <div class="row mx-5 mt-5 ">
            <?php if(empty($datos['tipoModulos'])){
                ?>
                <h2 class="text-center">No existen registros</h2>
                <?php
            }else{
                $alumnos = 0;
                $suma =0;
                ?>
            <?php } ?>
    </div>
<br>
                        <?php setlocale(LC_TIME, "es_ES");?>
    <!-- Footer del reporte -->
    <div class=" mx-5">
        <div class="text-center mt-3 col">
            <p class="font-weight-bold">
                Impreso en <?php echo  ucwords(strtolower($datos['sede']))?> el dia <?php echo strftime('%A')?>  <?php echo date("d")?> del mes de 
                <?php echo strftime('%B')?> del año <?php echo date("Y")?>
                
            </p>
            
        </div>
    </div>
</body>
</html>