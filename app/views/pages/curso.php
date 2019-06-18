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
                    <button  id="ivkcurso" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#agregarCurso">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo curso
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
                        <th class='secret'>ID</th>
                        <th>Nombre</th>
                        <th>Cohorte</th>
                        <th class='secret'>Descripcion</th>
                        <th class='secret'>Duracion</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th>Nivel</th>
                        <th class='secret'>Inicio</th>
                        <th>Fin</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['curso'] as $cursos) {
                    
                        echo "<tr>
                                <td class='secret'>$cursos->id_curso</td>
                                <td>$cursos->nombre_curso</td>
                                <td>$cursos->cohorte</td>
                                <td class='secret'>$cursos->descripcion</td>
                                <td class='secret'>$cursos->duracion</td>
                                <td>$cursos->sede</td>
                                <td>".($cursos->estado == 1?'ACTIVO':'INACTIVO')."</td>
                                <td>$cursos->nivel</td>
                                <td class='secret'>$cursos->fecha_inicio</td>
                                <td>$cursos->fecha_fin</td>
                                <td class='shrink'><button type='button' class='btn btn-warning btn_editar_curso' data-toggle='modal' data-target='#agregarCurso'><span class='fa fa-edit'></span> Editar</button></td>
                                <td class='shrink'><button id='btn_eliminar2' onclick='menjaseBaja(\"curso/updateDown/$cursos->id_curso\")' class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Dar baja</button></td>
                                </tr>
                                ";
                    }
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
                        <input type="text" name="ccohorte" id="ccohorte" placeholder="Escribe el cohorte Ej. Cohorte 9" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9 ]{1,64}'>

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

                        <label class="mrg-spr-ex" >Nivel del curso:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cnivel" id="cnivel1" value="1" required>
                                        Nivel 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cnivel" id="cnivel2" value="2" required>
                                        Nivel 2
                                    </label>
                                </div> 
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="cnivel" id="cnivel3" value="3" required>
                                        Nivel 3
                                    </label>
                                </div>         
                            </div>

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
                <input type="submit"  class="btn btn-success" value="Guardar" name="guardar_participante">
                <!-- <input type="button"  class="btn btn-warning" value="Actualizar" name="actualizar_participante" > -->
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