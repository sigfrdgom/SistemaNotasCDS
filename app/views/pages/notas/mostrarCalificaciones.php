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

    <?php if(!empty($datos['participantes'])) {?>
    <div class="row margen-abajo-card">
        <div class="card card-body">
            <div class="col-xl-12">
            <a href="<?php echo constant('RUTA_URL')?>/notas/ingresarNotas/<?php echo $datos['id_curso']?>/<?php echo $datos['id_modulo']?>" class="btn btn-primary ">Actualizar Notas</a>
                <input type="text" name="busqueda" class="float-right" >

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
                <table class="table table-sm table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nota1</th>
                        <th>Nota2</th>
                        <th>Nota3</th>
                        <th>Nota4</th>
                        <th>Nota5</th>
                        <th>Nota6</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['participantes'] as $participantes) {
                        ?>
                        <tr>
                            <td class="td-center"><?php echo $participantes->nombres?></td>
                            <td class="td-center"><?php echo $participantes->apellidos?></td>
                            <td class="td-center"><?php echo $participantes->nota1 ?></td>
                            <td class="td-center"><?php echo $participantes->nota2 ?></td>
                            <td class="td-center"><?php echo $participantes->nota3 ?></td>
                            <td class="td-center"><?php echo $participantes->nota4 ?></td>
                            <td class="td-center"><?php echo $participantes->nota5 ?></td>
                            <td class="td-center"><?php echo $participantes->nota6 ?></td>
                            <td class="td-center"><?php echo $participantes->observaciones ?></td>
                            <td class="td-center"><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                            </td>
                        </tr>
                    <?php }
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

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>