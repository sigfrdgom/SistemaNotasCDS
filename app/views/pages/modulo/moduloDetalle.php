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
                    <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarModulo" id="ivkmdl">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo modulo
                    </button>
                    <a href="#" 
                            title="Agregar Modulo"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un nuevo modulo para poder ser usuadp en los cursos que se imparten.">
                        <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
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
                            <th class='secret'>ID</th>
                            <th>Nombre</th>
                            <th class='secret'>Descripcion</th>
                            <th class='secret'>Duracion horas</th>
                            <th class='secret'>TipoModulo</th>
                            <th>Evaluacion 1</th>
                            <th>Evaluacion 2</th>
                            <th>Evaluacion 3</th>
                            <th>Evaluacion 4</th>
                            <th>Evaluacion 5</th>
                            <th>Evaluacion 6</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones
                                <a href="#" 
                                    title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                    data-content="Sirven para modificar informacion de un Modulo o darlo de baja">
                                <i class="fa fa-fw fa-question-circle pop-help"></i>
                                </a>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['modulo'] as $modulos) {  ?>
                        <tr>
                            <td class='secret'><?php echo $modulos->id_modulo ?></td>
                            <td><?php echo $modulos->nombre_modulo ?></td>
                            <td class='secret'><?php echo $modulos->descripcion_modulo ?></td>
                            <td class='secret'><?php echo $modulos->horas_modulo ?></td>
                            <td class='secret'><?php echo $modulos->tipo_modulo ?></td>
                            <td><?php echo $modulos->evaluacion1?></td>
                            <td><?php echo ($modulos->evaluacion2 == 0.0?'---': $modulos->evaluacion2) ?></td>
                            <td><?php echo ($modulos->evaluacion3 == 0.0?'---': $modulos->evaluacion3) ?></td>
                            <td><?php echo ($modulos->evaluacion4 == 0.0?'---': $modulos->evaluacion4) ?></td>
                            <td><?php echo ($modulos->evaluacion5 == 0.0?'---': $modulos->evaluacion5) ?></td>
                            <td><?php echo ($modulos->evaluacion6 == 0.0?'---': $modulos->evaluacion6) ?></td>
                            <td><?php echo ($modulos->estado == 1?'ACTIVO':'INACTIVO') ?></td>
                            <td class='shrink'><button  class='btn btn-warning btn_editar_modulo' data-toggle='modal' data-target='#agregarModulo'><span class='fa fa-edit'></span> Editar</button></td>
                            
                            <td class='shrink'><button id='btn_eliminar2' data-Modulo="<?php echo $modulos->id_modulo;?>"
                                onclick='menjaseBaja("<?php echo "modulo/down/$modulos->id_modulo;"?>")' 
                                class='centrado btn btn-danger'><span class='fa fa-trash'></span> Dar baja</button></td>
                        </tr>
                               
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <td class='shrink'><button id='btn_eliminar2' onclick='menjaseEliminar(\"modulo/delete/$modulos->id_modulo\")' class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Eliminar</button></td> -->
<div class="modal fade" id="agregarModulo">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" style="margin: 0% auto;" id="aggmod">Agregar un nuevo modulo de tipo <?php echo "\"".strtolower($datos['tipoModulo']->nombre)."\"" ?></h4>
            <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfmod">Modificar un modulo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="mod" method="POST" action="<?php echo RUTA_URL ?>/modulo/create"data-parsley-validate novalidate  onsubmit="return validarPorcentajes();">

                        <input type="hidden" name="mid" id="id">

                        <label for="mnombre" class="mrg-spr-ex">Nombre del modulo: </label>
                        <input type="text" name="mnombre" id="mnombre" placeholder="Escribe el nombre del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü#0-9 ]{1,64}'>

                        <label for="mdescripcion" class="mrg-spr-ex">Descripcion del modulo:</label>
                        <input type="text" name="mdescripcion" id="mdescripcion" placeholder="Escribe la descripcion del modulo" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü# ]{1,255}'>

                        <label for="mhoras" class="mrg-spr-ex">Horas del modulo:</label>
                        <input type="text" name="mhoras"  id="mhoras" placeholder="Escribe las horas del modulo" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü0-9 ]{1,64}'> 

                        <label for="mtipo_modulo" class="mrg-spr-ex">Tipo de modulo:</label>
								<select class="form-control select2" id="mti" name="mtipo_modulo" required>
                                    <!-- <option value="">Selecciona un tipo de modulo</option>     -->
                                        <?php
                                            // foreach ($datos['tipoModulo'] as $tm) {
                                                echo " <option value='".$datos['tipoModulo']->id_tipo_modulo."' >".$datos['tipoModulo']->nombre."</option>";
                                            // }
                                        ?>
								</select>

                        <label class="mrg-spr-ex" >Estado del modulo:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="mestado" id="mestado1" value="1" required checked>
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
                        
                        <div id="counter">
                        <label class="mrg-spr-ex" >Cantidad de evaluaciones del modulo:</label>
                            <div style="margin-left:2em;">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval1" value="0" required checked onclick="moduloEval(1)">
                                            1
                                        </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval2" value="0" required onclick="moduloEval(2)">
                                            2
                                        </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval3" value="0" required onclick="moduloEval(3)">
                                            3
                                        </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval4" value="0" required onclick="moduloEval(4)">
                                            4
                                        </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval5" value="0" required onclick="moduloEval(5)">
                                            5
                                        </label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="meval" id="meval6" value="0" required onclick="moduloEval(6)">
                                            6
                                        </label>
                                    </div>   
                            </div>
                        </div>


                        <label for="mevaluacion1" class="mrg-spr-ex" id="mel1">Porcentaje a asignar a evaluacion 1:</label>
                        <input type="number" name="mevaluacion1" id="me1" placeholder="Escribe el porcentaje de la evaluacion 1" 
                        class="form-control " min="0" max="100" step="1" required>

                        <label for="mevaluacion2" class="mrg-spr-ex" id="mel2">Porcentaje a asignar a evaluacion 2:</label>
                        <input type="number" name="mevaluacion2"  id="me2" placeholder="Escribe el porcentaje de la evaluacion 2" 
                        class="form-control " min="0" max="100" step="1"  value="0.0">

                        <label for="mevaluacion3" class="mrg-spr-ex" id="mel3">Porcentaje a asignar a evaluacion 3:</label>
                        <input type="number" name="mevaluacion3"  id="me3" placeholder="Escribe el porcentaje de la evaluacion 3" 
                        class="form-control " min="0" max="100" step="1"  value="0.0">

                        <label for="mevaluacion4" class="mrg-spr-ex" id="mel4">Porcentaje a asignar a evaluacion 4:</label>
                        <input type="number" name="mevaluacion4"  id="me4" placeholder="Escribe el porcentaje de la evaluacion 4" 
                        class="form-control " min="0" max="100" step="1"  value="0.0">

                        <label for="mevaluacion5" class="mrg-spr-ex" id="mel5">Porcentaje a asignar a evaluacion5:</label>
                        <input type="number" name="mevaluacion5"  id="me5" placeholder="Escribe el porcentaje de la evaluacion5" 
                        class="form-control " min="0" max="100" step="1"  value="0.0">

                        <label for="mevaluacion6" class="mrg-spr-ex" id="mel6">Porcentaje a asignar a evaluacion 6:</label>
                        <input type="number" name="mevaluacion6"  id="me6" placeholder="Escribe el porcentaje de la evaluacion 6" 
                        class="form-control " min="0" max="100" step="1" value="0.0">
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar Cambios" name="guardar_participante">
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal"  id="cancelmdlmodulo">Cancelar</button>
        </div>
      </div>
    </div>
</div>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>
<script src="<?php echo RUTA_URL ?>/js/modulosData.js"></script>