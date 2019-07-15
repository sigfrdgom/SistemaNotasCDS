<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';
?>

<!-- Start content -->
<div class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Ranking</li>
                        <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="card card-body">
                <?php if(empty($datos['tipoModulos'])){
                    ?>
                    <h2 class="text-center">No existen registros</h2>
                    <?php
                }else{?>
                <div class="card-deck">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover ">
                            <thead>
                            <th>Top</th>
                            <th>NOMBRE</th>
                            <?php
                            foreach ($datos['tipoModulos'] as $tipoModulo) {
                                ?>
                                <th><?php echo $tipoModulo->nombre ?> (<?php echo $tipoModulo->porcentaje ?>%)</th>
                                <?php
                            }
                            ?>
                            <th>PROMEDIO</th>
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


        <?php
        /*Importacion de Footer de la aplicacion */
        require_once RUTA_APP . '/views/include/footer.php';
        ?>
