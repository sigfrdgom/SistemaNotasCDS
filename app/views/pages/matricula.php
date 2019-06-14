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
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#agregarMatricula">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo matricula
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
                        <th>estado</th>
                        <th>Observaciones</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['matricula'] as $notas) {
                        echo "<tr>
                                <td>$notas->id_curso</td>
                                <td>$notas->id_participante</td>
                                <td>$notas->estado</td>
                                <td>$notas->observaciones</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><button id='btn_eliminar2' onclick='menjaseEliminar(\"matricula/delete/$notas->id_matricula\")' class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Eliminar</button></td>
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
          <h4 class="modal-title" style="margin: 0% auto;">Agregar una matricula</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/matricula/create"data-parsley-validate novalidate >

                        <label for="mparticipante" class="mrg-spr-ex">Participante:</label>
							<select class="form-control select2"  name="mid_participante" required>
                                <option value="">Selecciona un participante</option>    
                                    <?php
                                        foreach ($datos['participante'] as $p) {
                                            echo " <option value='$p->id_participante'>$p->nombres $p->apellidos  </option>";
                                        }
                                    ?>
							</select>
                        
                        <label for="mcurso" class="mrg-spr-ex">Curso:</label>
							<select class="form-control select2"  name="mid_curso" required>
                                <option value="">Selecciona un curso</option>    
                                    <?php
                                        foreach ($datos['curso'] as $curso) {
                                            echo " <option value='$curso->id_curso'>$curso->cohorte , $curso->nombre_curso</option>";
                                        }
                                    ?>
							</select>

                        <label class="mrg-spr-ex" >Estado de la matricula:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="mestado" id="pestado1" value="1" required>
                                        Activa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="mestado" id="pestado2" value="0" required>
                                        Inactiva
                                    </label>
                                </div>         
                            </div>

                        <label for="mobservacion" class="mrg-spr-ex">Observación de matricula:</label>
                        <input type="text" name="mobservaciones" placeholder="Escribe una observación para la matricula" 
                        class="form-control " pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü,. ]{1,128}'>
            
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