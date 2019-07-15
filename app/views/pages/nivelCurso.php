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
                    <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp;</h1>
                    <!-- El boton para agregar a traves de un modal -->
                    <button id="btnNivelCurso" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#agregarNivelCurso">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo Nivel de Curso
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
                    <table class="table table-sm table-bordered table-hover display center">
                        <thead>
                        <tr>
                            <th>Nivel</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        </thead>
                        <tbody id="tbody-table">
                        <?php
                        foreach ($datos['nivel_curso'] as $nivelCurso) {
                            ?>
                                <tr id="fila-<?php echo $nivelCurso->id_nivel_curso;?>">
                                <td style="display:none;"><?php echo $nivelCurso->id_nivel_curso ?></td>
                                <td><?php echo  $nivelCurso->nivel_curso ?></td>
                                <td><?php echo ($nivelCurso->estado ==1)? "Activo" : "Inactivo"; ?></td>
                                <td><button class='btn_edit centrado btn btn-warning' type="button"  data-toggle="modal" data-target="#agregarNivelCurso"><span class='fa fa-edit '></span> Editar</button></td>
                                
                                <td><button id='btn_eliminar2' 
                                onclick='menjaseEliminar("nivelCurso/delete/<?php echo $nivelCurso->id_nivel_curso;?>", <?php echo $nivelCurso->id_nivel_curso;?>)' 
                                class='centrado btn btn-danger'><span class='fa fa-trash'></span> Eliminar</button></td>
                                
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>


            <div class="modal fade" id="agregarNivelCurso">
                <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="margin: 0% auto;" id="aggNivelCurso">Agregar un nuevo Nivel de Curso</h4>
                            <h4 class="modal-title" style="margin: 0% auto;" id="mdfNivelCurso">Modificar un Nivel de Curso</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" id="frmNivelCurso" action="<?php echo RUTA_URL ?>/nivelCurso/create" data-parsley-validate
                                  novalidate>

                                <input type="hidden" id="idNivelCurso" name="id_nivel_curso">

                                <div class="form-group">
                                    <label for="nivel_curso">Nivel del Curso<span class="text-danger">*</span></label>
                                    <input type="text" name="nivel_curso" data-parsley-trigger="change" required
                                           placeholder="Ingrese el nivel del curso" class="form-control"
                                           id="nivel_curso">
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
                            <input type="submit" class="btn btn-success" value="Guardar" name="guardar_nivel_curso">
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