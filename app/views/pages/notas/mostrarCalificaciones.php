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
                    <a href="<?php echo constant('RUTA_URL') ?>/notas/ingresarNotas/<?php echo $datos['id_curso'] ?>/<?php echo $datos['id_modulo'] ?>"
                       class="btn btn-primary ">Actualizar Notas</a>
                    <div class="input-group mb-1 float-right col-sm-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                               data-id-curso="<?php echo $datos['id_curso'] ?>"
                               data-id-modulo="<?php echo $datos['id_modulo'] ?>" aria-label="Busqueda"
                               aria-describedby="basic-addon1">
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
                <table class="table table-sm table-bordered table-hover display table-text-center">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <?php if($datos['participantes'][0]->evaluacion1)  { ?>
                        <th>Nota1</th>
                        <?php } ?>
                        <?php if($datos['participantes'][0]->evaluacion2)  { ?>
                        <th>Nota2</th>
                        <?php } ?>
                        <?php if($datos['participantes'][0]->evaluacion3)  { ?>
                        <th>Nota3</th>
                        <?php } ?>
                        <?php if($datos['participantes'][0]->evaluacion4)  { ?>
                        <th>Nota4</th>
                        <?php } ?>
                        <?php if($datos['participantes'][0]->evaluacion5)  { ?>
                        <th>Nota5</th>
                        <?php } ?>
                        <?php if($datos['participantes'][0]->evaluacion6)  { ?>
                        <th>Nota6</th>
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
                            <td class="td-center"><?php echo $participantes->nombres ?></td>
                            <td class="td-center"><?php echo $participantes->apellidos ?></td>
                            <?php if ($participantes->evaluacion1){

                                ?>
                            <td class="td-center"><?php echo $participantes->nota1 ?></td>
                            <?php } ?>
                            <?php if ($participantes->evaluacion2){ ?>
                            <td class="td-center"><?php echo $participantes->nota2 ?></td>
                            <?php } ?>
                            <?php if ($participantes->evaluacion3){ ?>
                            <td class="td-center"><?php echo $participantes->nota3 ?></td>
                            <?php } ?>
                            <?php if ($participantes->evaluacion4){ ?>
                            <td class="td-center"><?php echo $participantes->nota4 ?></td>
                            <?php } ?>
                            <?php if ($participantes->evaluacion5){ ?>
                            <td class="td-center"><?php echo $participantes->nota5 ?></td>
                            <?php } ?>
                            <?php if ($participantes->evaluacion6){ ?>
                            <td class="td-center"><?php echo $participantes->nota6 ?></td>
                            <?php }
                            $promedio = ($participantes->nota1*($participantes->evaluacion1/100)
                                + $participantes->nota2*($participantes->evaluacion2/100)
                                + $participantes->nota3*($participantes->evaluacion3/100)
                                + $participantes->nota4*($participantes->evaluacion4/100)
                                + $participantes->nota5*($participantes->evaluacion5/100)
                                + $participantes->nota6*($participantes->evaluacion6/100)
                            );
                            ?>
                            <th class="td-center" <?php echo ($promedio>=6) ? 'style="background: #76D7C4"' : 'style="background: #F9AD96"' ?> ><?php
                                echo round($promedio, 2);
                                ?></th>
                            <td class="td-center"><?php echo $participantes->observaciones ?></td>
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

    <div class="modal fade" id="agregarNota">
        <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="margin: 0% auto;">Agregar una nota</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="prt" method="POST" action="<?php echo RUTA_URL ?>/porcentajeCurso/create"
                          data-parsley-validate novalidate>

                        <label for="nparticipante" class="mrg-spr-ex">Participante:</label>
                        <select class="form-control select2" name="nparticipante" required>
                            <option value="">Selecciona un participante</option>
                            <?php
                            foreach ($datos['participante'] as $p) {
                                echo " <option value='$p->id_participante'>$p->nombres $p->apellidos  </option>";
                            }
                            ?>
                        </select>

                        <label for="nmcurso" class="mrg-spr-ex">Curso:</label>
                        <select class="form-control select2" name="nmcurso" required>
                            <option value="">Selecciona un curso</option>
                            <?php
                            foreach ($datos['moduloCurso'] as $mc) {
                                echo " <option value='$mc->id_modulos_curso'>$mc->observaciones</option>";
                            }
                            ?>
                        </select>

                        <label for="nnotas" class="mrg-spr-ex">Notas modulo:</label>
                        <input type="text" name="nnotas" placeholder="Escribe una observación para la matricula"
                               class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü,. ]{1,128}'>

                        <label for="nfinal" class="mrg-spr-ex">Nota final:</label>
                        <input type="number" name="nfinal" placeholder="Escribe el porcentaje. Ej. 25.0"
                               class="form-control " min="0.0" max="10.0" step="0.1" required>

                        <label for="nobservacion" class="mrg-spr-ex">Observación de matricula:</label>
                        <input type="text" name="nobservacion" placeholder="Escribe una observación para la matricula"
                               class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}'>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Guardar" name="guardar_participante">
                    <input type="submit" class="btn btn-warning" value="Actualizar" name="actualizar_participante">
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo RUTA_URL ?>/js/views/notas.js"></script>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>