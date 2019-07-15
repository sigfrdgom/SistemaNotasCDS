<!DOCTYPE html>
<html lang="en">
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
<body>


<!-- Start content -->
<div class="content">

    <div class="container-fluid">
        <div class="text-center mt-3">
            <h2><?php echo $datos['titulo']?></h2>
            <h5><?php echo $datos['info']?></h5>
        </div>
        


        <div class="row">
            <div class="card card-body mx-5">
                <?php if(empty($datos['tipoModulos'])){
                    ?>
                    <h2 class="text-center">No existen registros</h2>
                    <?php
                }else{?>
                <div class="card-deck">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover ">
                            <thead >
                            <tr>
                                <th rowspan="2" class="align-middle">TOP</th>
                                <th rowspan="2" class="align-middle">PARTICIPANTE</th>
                                <th colspan="4">TIPOS DE MODULO</th>
                                <th rowspan="2" class="align-middle">PROMEDIO FINAL</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($datos['tipoModulos'] as $tipoModulo) {
                                    ?>
                                    <th><?php echo $tipoModulo->nombre ?> (<?php echo $tipoModulo->porcentaje ?>%)</th>
                                    <?php
                                }
                                ?>
                                
                            </tr>
                            
                            
                            </thead>
                            <tbody>
                            <?php
                            $c = 1;
                            foreach ($datos['lista'] as $lista) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $c ?></td>
                                    <td ><?php echo $lista['participante'] ?></td>
                                    <?php foreach ($lista['tipoModulo'] as $tipoModulo) {
                                        ?>
                                        <td class="text-center" <?php echo ($tipoModulo>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> ><?php echo $tipoModulo ?></td>
                                        <?php
                                    } ?>
                                    <td class="text-center" <?php echo ($lista['promedio']>6) ? 'style="background: rgb(130, 224, 170, 0.8);"' : 'style="background: rgb(241, 148, 138, 0.8);"' ?> ><?php echo $lista['promedio'] ?></td>
                                </tr>
                                <?php
                                $c++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

</body>
</html>