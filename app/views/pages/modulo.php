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
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un nuevo usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" method="POST" action="<?php echo RUTA_URL ?>/docente/create"data-parsley-validate novalidate >

                        <label for="dnombres" class="mrg-spr-ex">Nombres del usuario: </label>
                        <input type="text" name="dnombres" placeholder="Escribe los nombres del usuario" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                        <label for="dapellidos" class="mrg-spr-ex">Apellidos del usuario:</label>
                        <input type="text" name="dapellidos" placeholder="Escribe los apellidos del usuario" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü ]{1,64}'> 

                        <label for="dfecha_nacimiento" class="mrg-spr-ex">Fecha de nacimiento del usuario:</label>
                        <input type="date" name="dfechanacimiento" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 65 year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 18 year  -3 month"));?>"> 
                        
                        <label class="mrg-spr-ex" >Sexo del usuario:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="psexo" id="rsexo1" value="MASCULINO" required>
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="psexo" id="rsexo2" value="FEMENINO" required>
                                        Femenimo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="psexo" id="rsexo3" value="INEDFINIDO" required>
                                        Indefinido
                                    </label>
                                </div>         
                            </div>

                        <label for="ddui" class="mrg-spr-ex">DUI del usuario:</label>
                        <input type="text" name="ddui" id="ddui" placeholder="Ingresa el DUI Ej. 0123456-0" 
                        class="form-control pad-extra-input"  pattern='[0-9]{8}[-]{1}[0-9]{1}' required>
                        
                        <label for="dnit" class="mrg-spr-ex">NIT del usuario:</label>
                        <input type="text" name="dnit" id="dnit" placeholder="Ingresa el NIT Ej. 0210-010101-100-1" 
                        class="form-control pad-extra-input" pattern='[0-9]{4}[-]{1}[0-9]{6}[-]{1}[0-9]{3}[-]{1}[0-9]{1}' required>

                        <label for="despecialidad" class="mrg-spr-ex">Especialidad del usuario:</label>
                        <input type="text" name="despecialidad" placeholder="Escribe la especialidad del usuario" 
                        class="form-control pad-extra-input" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9/.#, ]{1,64}'>

                        <label class="mrg-spr-ex" >Tipo de usuario:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dtipo" id="tipo1" value="ADMINISTRADOR" required>
                                        Adimistrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dtipo" id="tipo2" value="DOCENTE" required>
                                        Docente
                                    </label>
                                </div>         
                            </div>

                        <label for="ppass" class="mrg-spr-ex">Ingresa un password para el participante:</label>
                        <input type="password" name="ppass" placeholder="Escribe un password para el participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'>

                        <!-- <label for="ppassc" class="mrg-spr-ex">Confirma el password para el participante:</label>
                        <input type="password" name="ppassc" placeholder="Confirma el password para el participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'> -->

                        <label class="mrg-spr-ex" >Estado del participante:</label>
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