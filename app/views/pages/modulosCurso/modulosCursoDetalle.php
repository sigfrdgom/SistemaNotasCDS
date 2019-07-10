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
                    <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarModulosCurso" id="ivkmmm">
                        <span class='fa fa-plus-square-o bigfonts'></span> Agregar modulo
                    </button>
                    <a href="#" 
                            title="Agregar Modulos a un curso"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un modulo a un curso para poder ser impartido por un docente en especifico que se asignara.">
                        <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Cohorte</li>
                    <li class="breadcrumb-item active">Niveles COHORTE</li>
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
                <table class="table table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th class='secret'>IDMC</th>
                        <th class='secret'>ID Curso</th>
                        <th class='secret'>Curso</th>
                        <th class='secret'>ID Modulo</th>
                        <th>Modulo</th>
                        <th class='secret'>ID docente</th>
                        <th>Docente</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones
                            <a href="#" 
                                    title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para modificar informacion de un Modulo en un curso o darlo de baja">
                                <i class="fa fa-fw fa-question-circle pop-help"></i>
                                </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['modulosCurso'] as $modulosCursos) {
                        echo "<tr>
                                <td class='secret'>$modulosCursos->id_modulos_curso</td>
                                <td class='secret'>$modulosCursos->id_curso</td>
                                <td class='secret'>$modulosCursos->nombre_curso</td>
                                <td class='secret'>$modulosCursos->id_modulo</td>
                                <td>$modulosCursos->nombre_modulo</td>
                                <td class='secret'>$modulosCursos->id_docente</td>
                                <td>$modulosCursos->nombre</td>
                                <td>$modulosCursos->observaciones</td>
                                <td class='shrink'><button type='button' class='btn btn-warning btn_editar_mc' data-toggle='modal' data-target='#editarModulosCurso'><span class='fa fa-edit'></span> Editar</button></td>
                                <td class='shrink'><button id='btn_baja' onclick='menjaseEliminar(\"modulosCurso/delete/$modulosCursos->id_modulos_curso\")' class='btn btn-danger alert_sweet'><span class='fa fa-warning bigfonts'></span> Eliminar</button></td>
                                </tr>
                                ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>





















<div class="modal fade" id="agregarModulosCurso">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un modulo al curso <?php echo $datos['curso']->nombre_curso ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="mm" method="POST" action="<?php echo RUTA_URL ?>/modulosCurso/create"data-parsley-validate novalidate >
                        
                        <label for="mcid_curso" class="mrg-spr-ex">Curso:</label>
							<select class="form-control select2"  name="mcid_curso" required>
                                <!-- <option value="">Selecciona un curso</option>     -->
                                    <?php
                                        echo " <option value='".$datos['curso']->id_curso."'>".$datos['curso']->cohorte." ,".$datos['curso']->nombre_curso." , nivel ".$datos['curso']->nivel."</option>";
                                    ?>
							</select>

                            <label for="tipo_modulo" class="mrg-spr-ex">Tipos de modulos</label>
                            <div>
                                <?php foreach ($datos['tipoModulo'] as $m) { ?>
                                    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="tipoModulo[]" onclick='mostrar("<?php echo $m->nombre ?>")' id="CHK_<?php echo $m->nombre?>">
                                        <label class="form-check-label" for="tipoModulo"><?php echo $m->nombre ?></label>
                                    </div>
                                    <!-- <hr class="border border-info"> -->
                                    
                                    <div id="div_<?php echo $m->nombre?>" class="secret">
                                        <?php foreach ($datos['modulo'] as $n) { ?>
                                            
                                                <?php if ($n->tipo_modulo == $m->id_tipo_modulo) { ?>

                                                    <div class="ml-5 mr-2 my-1 row border-bottom border-secondary py-1">

                                                        <div class="col-4 form-check form-check-inline" >
                                                            <input class='form-check-input' type='checkbox' name='mcid_modulo[]' value='$n->id_modulo' onclick='valFM("<?php echo $n->nombre_modulo ?>")'
                                                            id="CHK_<?php echo $n->nombre_modulo ?>">
                                                            <div>
                                                                <label class="form-check-label" for="mcid_modulo[]"><?php echo $n->nombre_modulo ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <select class="form-control select2"  name="mcid_docente" id="<?php echo "date_".$n->nombre_modulo ?>">
                                                                <option value="">Selecciona el docente </option>    
                                                                    <?php foreach ($datos['docente'] as $d) { ?>
                                                                        <option value='<?php echo $d->id_docente ?>'><?php echo $d->nombres." ".$d->apellidos ?> </option>
                                                                    <?php } ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                <?php } ?>
                                            
                                        <?php } ?>
                                        </div>
                                    <br>                      
                                <?php } ?>
                                <hr class="border border-secondary"> 
                            </div>

                        <label for="mcobservacion" class="mrg-spr-ex">Observación del modulo en el curso:</label>
                        <input type="text" name="mcobservaciones" placeholder="Escribe una observación para la matricula" 
                        class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}' required>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar" name="guardar_participante">
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
</div>























<div class="modal fade" id="editarModulosCurso">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Editar un modulo al curso <?php echo $datos['curso']->nombre_curso ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="mmm" method="POST" action="<?php echo RUTA_URL ?>/modulosCurso/update" data-parsley-validate novalidate >

                    <input type="hidden" name="idmc" id="idmc">
                        <label for="mcid_curso" class="mrg-spr-ex">Curso:</label>
							<select class="form-control select2"  name="mcid_curso" id="mcid_curso" required>
                                <!-- <option value="">Selecciona un curso</option>     -->
                                    <?php
                                        // foreach ($datos['curso'] as $curso) {
                                        //     echo " <option value='$curso->id_curso'>$curso->cohorte , $curso->nombre_curso</option>";
                                        // }
                                
                                        echo " <option value='".$datos['curso']->id_curso."'>".$datos['curso']->cohorte." ,".$datos['curso']->nombre_curso." , nivel ".$datos['curso']->nivel."</option>";
                                    
                                    ?>
							</select>

                        <label for="mcid_modulo" class="mrg-spr-ex">Modulo:</label>
							<select class="form-control select2"  name="mcid_modulo" id="mcid_modulo" required>
                                <option value="">Selecciona un modulo</option>    
                                    <?php
                                        foreach ($datos['modulo'] as $m) {
                                            echo " <option value='$m->id_modulo'>$m->nombre_modulo </option>";
                                        }
                                    ?>
							</select>

                        <label for="mcid_docente" class="mrg-spr-ex">Docente:</label>
							<select class="form-control select2"  name="mcid_docente"  id="mcid_docente" required>
                                <option value="">Selecciona un docente</option>    
                                    <?php
                                        foreach ($datos['docente'] as $d) {
                                            echo " <option value='$d->id_docente'>$d->nombres $d->apellidos  </option>";
                                        }
                                    ?>
							</select>

                        <label for="mcobservacion" class="mrg-spr-ex">Observación deL modulo en el curso:</label>
                        <input type="text" name="mcobservaciones" id="mcobservaciones" placeholder="Escribe una observación para la matricula" 
                        class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}'>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar" name="guardar_participante">
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="canclermdlmc">Cancelar</button>
        </div>
      </div>
    </div>
</div>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>

