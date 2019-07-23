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
                        <a href="<?php echo constant('RUTA_URL') ?>/notas/modulos/<?php echo $datos['id_curso'] ?>">
                            <i class="fas fa-arrow-circle-left color-primary"></i>
                        </a>
                        <?php echo $datos['titulo'] ?> &nbsp;</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Notas</li>
                        <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <?php if (!empty($datos['participantes'])) { ?>
            <div class="row margen-abajo-card">
                <div class="card card-body">
                    <div class="col-xl-12">
                        <a href="<?php echo constant('RUTA_URL') ?>/notas/ingresarNotas/<?php echo $datos['id_curso'] ?>/<?php echo $datos['id_modulo'] ?>" class="btn btn-primary ">Actualizar Notas</a>
                        <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda" data-id-curso="<?php echo $datos['id_curso'] ?>" data-id-modulo="<?php echo $datos['id_modulo'] ?>" aria-label="Busqueda" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <div class="row">
            <div class="card card-body">

                <?php
                if (empty($datos['participantes'])) {
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover display table-text-center align-middle">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <?php if ($datos['participantes'][0]->evaluacion1) { ?>
                                        <th>Nota1 (<?php echo $datos['participantes'][0]->evaluacion1 ?>%)</th>
                                    <?php } ?>
                                    <?php if ($datos['participantes'][0]->evaluacion2) { ?>
                                        <th>Nota2 (<?php echo $datos['participantes'][0]->evaluacion2 ?>%)</th>
                                    <?php } ?>
                                    <?php if ($datos['participantes'][0]->evaluacion3) { ?>
                                        <th>Nota3 (<?php echo $datos['participantes'][0]->evaluacion3 ?>%)</th>
                                    <?php } ?>
                                    <?php if ($datos['participantes'][0]->evaluacion4) { ?>
                                        <th>Nota4 (<?php echo $datos['participantes'][0]->evaluacion4 ?>%)</th>
                                    <?php } ?>
                                    <?php if ($datos['participantes'][0]->evaluacion5) { ?>
                                        <th>Nota5 (<?php echo $datos['participantes'][0]->evaluacion5 ?>%)</th>
                                    <?php } ?>
                                    <?php if ($datos['participantes'][0]->evaluacion6) { ?>
                                        <th>Nota6 (<?php echo $datos['participantes'][0]->evaluacion6 ?>%)</th>
                                    <?php } ?>
                                    <th>Promedio</th>
                                    <?php  ?>
                                    <th>Observaciones</th>
                                    <?php  ?>
                                    <!--<th colspan="1">Acciones</th>-->
                                </tr>
                            </thead>
                            <tbody id="contenido">
                                <?php
                                foreach ($datos['participantes'] as $participantes) {
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo $participantes->nombres ?></td>
                                        <td class="text-center align-middle"><?php echo $participantes->apellidos ?></td>
                                        <?php if ($participantes->evaluacion1) {

                                            ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota1 ?></td>
                                        <?php } ?>
                                        <?php if ($participantes->evaluacion2) { ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota2 ?></td>
                                        <?php } ?>
                                        <?php if ($participantes->evaluacion3) { ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota3 ?></td>
                                        <?php } ?>
                                        <?php if ($participantes->evaluacion4) { ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota4 ?></td>
                                        <?php } ?>
                                        <?php if ($participantes->evaluacion5) { ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota5 ?></td>
                                        <?php } ?>
                                        <?php if ($participantes->evaluacion6) { ?>
                                            <td class="text-center align-middle"><?php echo $participantes->nota6 ?></td>
                                        <?php }
                                        $promedio = ($participantes->nota1 * ($participantes->evaluacion1 / 100)
                                            + $participantes->nota2 * ($participantes->evaluacion2 / 100)
                                            + $participantes->nota3 * ($participantes->evaluacion3 / 100)
                                            + $participantes->nota4 * ($participantes->evaluacion4 / 100)
                                            + $participantes->nota5 * ($participantes->evaluacion5 / 100)
                                            + $participantes->nota6 * ($participantes->evaluacion6 / 100));
                                        ?>
                                        <th class="text-center align-middle" <?php echo ($promedio >= 6) ? 'style="background: #76D7C4"' : 'style="background: #F9AD96"' ?>><?php
                                                                                                                                                                            echo round($promedio, 2);
                                                                                                                                                                            ?></th>
                                        <td class="text-center align-middle" style="max-width: 240px;"><?php echo $participantes->observaciones ?></td>
                                        <!--<td class="td-center"><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span>
                                    Editar</a></td>
                            </td>-->
                                    </tr>
                                <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        

        <script src="<?php echo RUTA_URL ?>/js/views/notas.js"></script>

        <?php
        /*Importacion de Footer de la aplicacion */
        require_once RUTA_APP . '/views/include/footer.php';
        ?>