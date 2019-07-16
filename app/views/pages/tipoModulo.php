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
                    <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp;</h1>
                    <!-- El boton para agregar a traves de un modal -->
                    <button id="btnTipoModulo" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#agregarTipoModulo">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo Tipo Modulo
                    </button>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">

            <div class="card card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover display">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-table">
                        <?php
                        foreach ($datos['TipoModulo'] as $tipoModelos) {
                            ?>
                                <tr id="fila-<?php echo $tipoModelos->id_tipo_modulo;?>">
                                <td style="display:none;"><?php echo $tipoModelos->id_tipo_modulo ?></td>
                                <td><?php echo  $tipoModelos->nombre ?></td>
                                <td><?php echo ($tipoModelos->estado ==1)? "Activo" : "Inactivo"; ?></td>
                                <td><button class='btn_modal_editar centrado btn btn-warning' data-tipomodulo="<?php echo $tipoModelos->id_tipo_modulo;?>"><span class='fa fa-edit '></span> Editar</button></td>
                                
                                <!-- <td><button id='btn_eliminar2' 
                                onclick='menjaseEliminar("tipoModulo/delete/<?php echo $tipoModelos->id_tipo_modulo;?>", <?php echo $tipoModelos->id_tipo_modulo;?>)' 
                                class='centrado btn btn-danger'><span class='fa fa-trash'></span> Eliminar</button></td>
                                
                                </tr> -->

                                <td><button class="btnEliminartm centrado btn btn-danger" data-url="<?php echo RUTA_URL."/tipoModulo/delete/"?>"
                                data-tipomodulo="<?php echo $tipoModelos->id_tipo_modulo;?>"><span class='fa fa-trash'></span> Eliminar</button></td>
                                




                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="modal fade" id="agregarTipoModulo">
                <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0% auto;" id="aggTipoModulo">Agregar un nuevo Tipo de Modulo</h4>
                            <h4 class="modal-title" style="margin: 0% auto;" id="mdfTipoModulo">Modificar un Tipo de Modulo</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" id="frmTipoModulo" action="<?php echo RUTA_URL ?>/tipoModulo/create" data-parsley-validate
                                  novalidate>



                                <input type="hidden" id="id_idTipoModulo" name="id_tipo_modulo">
                                <div class="form-group">
                                    <label for="nombreTipoModulo">Nombre de Tipo<span class="text-danger">*</span></label>
                                    <input type="text" name="nombreTipoModulo" data-parsley-trigger="change" required
                                           placeholder="Ingrese el nombre de usuario" class="form-control"
                                           id="idTipoModulo">
                                </div>

                                <div class="form-group">
                                    <label for="idEstado">Estado<span class="text-danger">*</span></label>
                                    <select name="estado" id="idEstado" placeholder="Estado" class="form-control" data-parsley-trigger="change" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Guardar" name="guardar_tipo_modulo">
                            </form>
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->
            <script src="assets/plugins/switchery/switchery.min.js"></script>

            <?php
            /*Importacion de Footer de la aplicacion */
            require_once RUTA_APP . '/views/include/footer.php';

            ?>



