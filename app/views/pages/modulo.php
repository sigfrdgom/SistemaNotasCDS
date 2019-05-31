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
                            <th>Evaluacion 1</th>
                            <th>Evaluacion 2</th>
                            <th>Evaluacion 3</th>
                            <th>Evaluacion 4</th>
                            <th>Evaluacion 5</th>
                            <th>Evaluacion 6</th>
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
                                <td>$modulos->evaluacion1</td>
                                <td>$modulos->evaluacion2</td>
                                <td>$modulos->evaluacion3</td>
                                <td>$modulos->evaluacion4</td>
                                <td>$modulos->evaluacion5</td>
                                <td>$modulos->evaluacion6</td>
                                <td>$modulos->estado</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><button id='btn_eliminar2' onclick='menjaseEliminar(\"modulo/delete/$modulos->id_modulo\")' class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Eliminar</button></td>
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
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un nuevo modulo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/modulo/create"data-parsley-validate novalidate >

                        <label for="mnombre" class="mrg-spr-ex">Nombre del modulo: </label>
                        <input type="text" name="mnombre" placeholder="Escribe el nombre del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                        <label for="mdescripcion" class="mrg-spr-ex">Descripcion del modulo:</label>
                        <input type="text" name="mdescripcion" placeholder="Escribe la descripcion del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,255}'>

                        <label for="mhoras" class="mrg-spr-ex">Horas del modulo:</label>
                        <input type="text" name="mhoras" placeholder="Escribe las horas del modulo" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü0-9 ]{1,64}'> 

                        <label for="mtipo_modulo" class="mrg-spr-ex">Tipo de modulo:</label>
								<select class="form-control select2"  name="mtipo_modulo" required>
                                    <option value="">Selecciona un tipo de modulo</option>    
                                        <?php
                                            foreach ($datos['tipoModulo'] as $tm) {
                                                echo " <option value='$tm->id_tipo_modulo'>$tm->nombre</option>";
                                            }
                                        ?>
								</select>

                        <label class="mrg-spr-ex" >Estado del modulo:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="mestado" id="mestado1" value="1" required>
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="mestado" id="mestado2" value="0" required>
                                        Inactivo
                                    </label>
                                </div>         
                            </div>

                        <label for="mevaluacion1" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion 1:</label>
                        <input type="number" name="mevaluacion1" placeholder="Escribe el porcentaje de la evaluacion 1" 
                        class="form-control " min="1" max="100" step="1" required>

                        <label for="mevaluacion2" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion 2:</label>
                        <input type="number" name="mevaluacion2" placeholder="Escribe el porcentaje de la evaluacion 2" 
                        class="form-control " min="1" max="100" step="1">

                        <label for="mevaluacion3" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion 3:</label>
                        <input type="number" name="mevaluacion3" placeholder="Escribe el porcentaje de la evaluacion 3" 
                        class="form-control " min="1" max="100" step="1">

                        <label for="mevaluacion4" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion 4:</label>
                        <input type="number" name="mevaluacion4" placeholder="Escribe el porcentaje de la evaluacion 4" 
                        class="form-control " min="1" max="100" step="1">

                        <label for="mevaluacion5" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion5:</label>
                        <input type="number" name="mevaluacion5" placeholder="Escribe el porcentaje de la evaluacion5" 
                        class="form-control " min="1" max="100" step="1">

                        <label for="mevaluacion6" class="mrg-spr-ex">Porcentaje a asiganar a evaluacion 6:</label>
                        <input type="number" name="mevaluacion6" placeholder="Escribe el porcentaje de la evaluacion 6" 
                        class="form-control " min="1" max="100" step="1">
            
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