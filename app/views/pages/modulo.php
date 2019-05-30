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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarModulo">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo modulo
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
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Duracion horas</th>
                        <th>TipoModulo</th>
                        <th>Evaluaciones</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['modulo'] as $modulos) {
                        echo "<tr>
                                <td>$modulos->nombre_modulo</td>
                                <td>$modulos->descripcion_modulo</td>
                                <td>$modulos->horas_modulo</td>
                                <td>$modulos->tipo_modulo</td>
                                <td>$modulos->evaluaciones</td>
                                <td>$modulos->estado</td>
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


<div class="modal fade" id="agregarModulo">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un nuevo modulo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/docente/create"data-parsley-validate novalidate >

                        <label for="mnombre" class="mrg-spr-ex">Nombre del modulo: </label>
                        <input type="text" name="mnombre" placeholder="Escribe el nombre del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                        <label for="mdescripcion" class="mrg-spr-ex">Descripcion del modulo:</label>
                        <input type="text" name="mdescripcion" placeholder="Escribe la descripcion del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,255}'>

                        <label for="mhoras" class="mrg-spr-ex">Horas del modulo:</label>
                        <input type="text" name="mhoras" placeholder="Escribe las horas del modulo" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü ]{1,64}'> 

                        <label for="ctipo_modulo" class="mrg-spr-ex">Tipo de modulo:</label>
								<select class="form-control select2"  name="csede" required>
                                    <option value="">Selecciona un tipo</option>    
                                        <?php
                                            foreach ($datos['tipoModulo'] as $tm) {
                                                echo " <option value='$tm->id_tipo_modulo'>$tm->nombre</option>";
                                            }
                                        ?>
								</select>

                        <label for="mevaluacions" class="mrg-spr-ex">Cantidad de evaluacion:</label>
                        <input type="number" name="mevaluaciones" placeholder="Escribe la cantidad de evaluaciones del modulo" 
                        class="form-control " min="0" max="10" step="1" required>
                        

                        <label class="mrg-spr-ex" >Estado del modulo:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pestado" id="pestado1" value="1" required>
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="pestado" id="pestado2" value="0" required>
                                        Inactivo
                                    </label>
                                </div>         
                            </div>
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