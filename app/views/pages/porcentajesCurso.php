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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarPorcentaje">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo porcentaje curso
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
                <table class="table table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Tipo modulo</th>
                        <th>Porcentaje</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['porcentajesCurso'] as $porcentajesCursos) {
                        echo "<tr>
                                <td>$porcentajesCursos->id_curso</td>
                                <td>$porcentajesCursos->id_tipo_modulo</td>
                                <td>$porcentajesCursos->porcentaje</td>
                                <td>$porcentajesCursos->observacion</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><button id='btn_eliminar2' onclick='menjaseEliminar(\"porcentajeCurso/delete/$porcentajesCursos->id_porcentajes_curso\")' class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Eliminar</button></td>
                                </tr>
                                ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

<div class="modal fade" id="agregarPorcentaje">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un nuevo porcentaje</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/porcentajeCurso/create"data-parsley-validate novalidate >

                        <label for="pcidCurso" class="mrg-spr-ex">Curso:</label>
							<select class="form-control select2"  name="pid_curso" required>
                                <option name="oid_curso" >Selecciona un curso</option>
                                    <?php
                                        foreach ($datos['curso'] as $curso) {
                                            echo " <option value='$curso->id_curso'>$curso->cohorte , $curso->nombre_curso</option>";
                                        }
                                    ?>
							</select>

                        <label for="pctipo_modulo" class="mrg-spr-ex">Tipo de modulo:</label>
							<select class="form-control select2"  name="pid_tipo_modulo" required>
                                <option name="oid_tipo_modulo" >Selecciona un tipo de modulo</option>
                                    <?php
                                        foreach ($datos['tipoModulo'] as $tm) {
                                            echo " <option value='$tm->id_tipo_modulo'>$tm->nombre</option>";
                                        }
                                    ?>
							</select>

                        <label for="mevaluacions" class="mrg-spr-ex">Porcentaje a asignar:</label>
                        <input type="number" name="pporcentaje" placeholder="Escribe el porcentaje. Ej. 25.0"
                        class="form-control " min="1.0" max="100.0" step="0.1" required>

                        <label for="mdescripcion" class="mrg-spr-ex">Observación:</label>
                        <input type="text" name="pobservacion" placeholder="Escribe una observación"
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}'>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar" name="guardar_participante">
                <input type="submit"  class="btn btn-warning" value="Actualizar" name="actualizar_participante">
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


