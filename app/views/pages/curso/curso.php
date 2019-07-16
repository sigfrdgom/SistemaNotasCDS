<?php
/*Importacion de Header de la aplicacion */
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
                    <button  id="ivkcurso" type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarCurso">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo curso
                    </button>

                    <a href="#" 
                            title="Agregar Curso"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un nuevo curso para poder asignarle modulos y realizar la matricula de participantes en ellos.">
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
            <!-- Para busquedas -->
            <div class="mb-2">
                <?php if (!empty($datos['curso'])) { ?>
                    <div class="col-xl-12">
                                
                        <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                    data-id-curso="<?php echo $datos['id_curso'] ?>"
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover display text-center">
                    <thead>
                    <tr>
                        <th class='secret'>ID</th>
                        <th>Nombre</th>
                        <th>Numero participantes</th>
                        <th>Cohorte</th>
                        <th class='secret'>Descripcion</th>
                        <th class='secret'>Duracion</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th>Nivel</th>
                        <th class='secret'>Inicio</th>
                        <th>Fin</th>
                        <th colspan="3">Acciones
                            <a href="#" 
                                title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirven para modificar informacion de un curso, darlo de baja o promover este curso a un nuevo nivel">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tbody-table">
                    <?php
                     
                    foreach ($datos['curso'] as $cursos) { ?>
                    
                        <tr id='fila-<?php echo $cursos->id_curso; ?>' class="center">
                                <td class='secret'><?php echo $cursos->id_curso; ?></td>
                                <td><?php echo $cursos->nombre_curso ?></td>

                                <!-- ESTA MALO -->
                                <td><?php  $conteo=$datos['cantidadParticipantes']->countParticipante($cursos->id_curso);
                                echo $conteo[0]->participantes;
                                
                                
                                ?></td>
                                
                                <td><?php echo $cursos->cohorte; ?></td>
                                <td class='secret'><?php echo $cursos->descripcion ?> </td>
                                <td class='secret'><?php echo $cursos->duracion ?></td>
                                <td><?php echo $cursos->sede ?></td> 
                                <td><?php echo ($cursos->estado == 1? "ACTIVO":"INACTIVO") ?></td>
                                
                            
                                
                                <td class="nivel"><?php $datosNivelArray=$datos['obtenerNivel']; foreach($datosNivelArray as $niveles)
                                {if(($niveles->id_nivel_curso)==$cursos->nivel){ echo $niveles->nivel_curso;}}?></td>

                                <td class='secret'><?php echo $cursos->fecha_inicio ?></td>
                                <td><?php echo $cursos->fecha_fin; ?></td>
                                <td class='shrink'><button type='button' data-nivel="<?php echo $cursos->nivel;?>"
                                class='btn btn-warning btn_editar_curso' 
                                data-toggle='modal' data-target='#agregarCurso'><span class='fa fa-edit'></span> Editar</button></td>
                                <td class='shrink'><button id='btn_eliminar2' onclick="menjaseBaja('curso/updateDown/<?php echo $cursos->id_curso ?>', <?php echo $cursos->id_curso ?>)" class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Dar baja</button></td>
                                
                                <?php  if ($cursos->nivel < 3) {  ?>
                                    
                                        <td class="shrink"><button type="button" class="btn btn-info btn_promover_curso ivkprmcurso" data-toggle="modal" data-target="#promoverCurso" >
                                        <span class='fa fa-line-chart bigfonts'></span> Promover</button></td>

                                <?php } else{ ?>

                                        <td class="shrink"></td>

                                <?php } ?>

                        </tr>
                                
                                <?php }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
<!-- El modal para agregar un nuevo curso -->
<div class="modal fade" id="agregarCurso">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;" id="aggcurso">Agregar un nuevo Curso</h4>
          <h4 class="modal-title" style="margin: 0% auto;" id="mdfcurso">Modificar un Curso</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="curso" method="POST" action="<?php echo RUTA_URL ?>/curso/create"data-parsley-validate novalidate >
                        
                        <input type="hidden" name="cid" id="cid">

                        <label for="cnombre" class="mrg-spr-ex">Nombre del curso: </label>
                        <input type="text" name="cnombre" id="cnombre" placeholder="Escribe el nombre del curso" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü#, ]{1,64}'>

                        <label for="ccohorte" class="mrg-spr-ex">Cohorte del curso:</label>
                        <!-- <input type="text" name="ccohorte" id="ccohorte" placeholder="Escribe el cohorte Ej. Cohorte 9" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9 ]{1,64}'> -->

                                <select class="form-control select2"  name="ccohorte"  id="ccohorte" required>    
                                    <option value="">Selecciona el cohorte</option>
                                    <option value="COHORTE 1">COHORTE 1</option>
                                    <option value="COHORTE 2">COHORTE 2</option>
                                    <option value="COHORTE 3">COHORTE 3</option>
                                    <option value="COHORTE 4">COHORTE 4</option>
                                    <option value="COHORTE 5">COHORTE 5</option>
                                    <option value="COHORTE 6">COHORTE 6</option>
                                    <option value="COHORTE 7">COHORTE 7</option>
                                </select>
                                

                        <label for="cdescripcion" class="mrg-spr-ex">Descripcion del curso:</label>
                        <input type="text" name="cdescripcion" id="cdescripcion" placeholder="Escribe la descripcion del curso" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,128}'>

                        <label for="cduracion" class="mrg-spr-ex">Duracion del curso:</label>
                        <input type="text" name="cduracion" id="cduracion" placeholder="Escribe la duracion Ej. 12 semanas" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9 ]{1,64}'>

                        <label for="csede" class="mrg-spr-ex">Sede del curso:</label>
								<select class="form-control select2"  name="csede"  id="csede" required>    
                                    <option value="">Selecciona una sede</option>
                                    <option value="AHUACHAPAN">Ahuchapan</option>
									<option value="SANTA ANA">Santa Ana</option>
									<option value="SAN SALVADOR">San Salvador</option>
									<option value="SONSONATE">Sonsonate</option>
								</select>
                        
                        <label class="mrg-spr-ex" >Estado del curso:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cestado" id="cestado1" value="1" required>
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cestado" id="cestado2" value="0" required>
                                        Inactivo
                                    </label>
                                </div>         
                            </div>

                            <label for="cnivel" class="mrg-spr-ex">NIVEL DEL CURSO:</label>
								<select class="form-control select2"  name="cnivel" id="cnivel" required>
                                    <option value="">Selecciona el nivel Curso</option>    
                                        <?php
                                            foreach ($datos['obtenerNivel'] as $tm) {
                                                echo " <option value='$tm->id_nivel_curso' >$tm->nivel_curso</option>";
                                            }
                                        ?>
								</select>

                        <!-- <label for="cnivel" class="mrg-spr-ex">Nivel del curso:</label>
                        <input type="text" name="cnivel" id="cnivel" placeholder="Ingresa el nivel del curso" 
                        class="form-control"  pattern='[1-3]{1}' required> -->

                        <label for="cfecha_inicio" class="mrg-spr-ex">Fecha de inicio del curso:</label>
                        <input type="date" name="cfecha_inicio" id="cfecha_inicio" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."-2  year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."+2 year  +3 month"));?>">

                        <label for="cfecha_fin" class="mrg-spr-ex">Fecha de fin del curso:</label>
                        <input type="date" name="cfecha_fin" id="cfecha_fin" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."-2  year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."+2 year  +3 month"));?>">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success " value="Guardar" name="guardar_participante">
                <!-- <input type="button"  class="btn btn-warning" value="Actualizar" name="actualizar_participante" > -->
            </form>
            <button type="button" class="btn btn-danger " data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
</div>



<!-- Modal para promover un curso -->
<div class="modal fade " id="promoverCurso">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;" id="headprmcurso">Promover el curso </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prmcurso" method="POST" action="<?php echo RUTA_URL ?>/curso/" data-parsley-validate novalidate >
                        
                        <input type="number" class="form-control secret" name="prmcid" id="prmcid" readonly >

                        <label for="prmduracion" class="mrg-spr-ex">Duracion del curso:</label>
                        <input type="text" name="prmduracion" id="prmduracion" placeholder="Escribe la duracion Ej. 12 semanas" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9 ]{1,64}'>

                        <label for="prmcfecha_inicio" class="mrg-spr-ex">Fecha de inicio del curso:</label>
                        <input type="date" name="prmcfecha_inicio" id="prmcfecha_inicio" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."-2  year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."+2 year  +3 month"));?>">

                        <label for="prmcfecha_fin" class="mrg-spr-ex">Fecha de fin del curso:</label>
                        <input type="date" name="prmcfecha_fin" id="prmcfecha_fin" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."-2  year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."+2 year  +3 month"));?>">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Promover" name="guardar_promover_curso">
                <!-- <input type="button"  class="btn btn-warning" value="Actualizar" name="actualizar_participante" > -->
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelprmcurso">Cancelar</button>
        </div>
        
      </div>
    </div>
</div>

<script src="<?php echo RUTA_URL ?>/js/views/cursos.js"></script>
<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>