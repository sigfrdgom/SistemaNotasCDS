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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarMatricula">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo modulo por curso
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
                        <th>Participante</th>
                        <th>Docente</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['modulosCurso'] as $modulosCursos) {
                        echo "<tr>
                                <td>$modulosCursos->id_curso</td>
                                <td>$modulosCursos->id_modulo</td>
                                <td>$modulosCursos->id_docente</td>
                                <td>$modulosCursos->observaciones</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><a href='' class='btn btn-danger'><span class='fa fa-trash'></span> Eliminar</a></td>
                                </tr>
                                ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


<div class="modal fade" id="agregarMatricula">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un modulo al curso</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/porcentajeCurso/create"data-parsley-validate novalidate >

                        <label for="mccurso" class="mrg-spr-ex">Curso:</label>
							<select class="form-control select2"  name="mcurso" required>
                                <option value="">Selecciona un curso</option>    
                                    <?php
                                        foreach ($datos['curso'] as $curso) {
                                            echo " <option value='$curso->id_curso'>$curso->cohorte , $curso->nombre_curso</option>";
                                        }
                                    ?>
							</select>

                        <label for="mcmodulo" class="mrg-spr-ex">Modulo:</label>
							<select class="form-control select2"  name="mcmodulo" required>
                                <option value="">Selecciona un modulo</option>    
                                    <?php
                                        foreach ($datos['modulo'] as $m) {
                                            echo " <option value='$m->id_modulo'>$m->nombre_modulo </option>";
                                        }
                                    ?>
							</select>

                        <label for="mcdocente" class="mrg-spr-ex">Docente:</label>
							<select class="form-control select2"  name="mcdocente" required>
                                <option value="">Selecciona un docente</option>    
                                    <?php
                                        foreach ($datos['docente'] as $d) {
                                            echo " <option value='$d->id_docente'>$d->nombres $d->apellidos  </option>";
                                        }
                                    ?>
							</select>

                        <label for="mCobservacion" class="mrg-spr-ex">Observación deL modulo en el curso:</label>
                        <input type="text" name="mCobservacion" placeholder="Escribe una observación para la matricula" 
                        class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}'>
            
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