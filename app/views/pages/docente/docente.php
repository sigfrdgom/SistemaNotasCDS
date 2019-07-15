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
                <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp; &nbsp;</h1>

                <!-- El boton para agregar a traves de un modal -->
                    <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#agregarUsuario" id="ivkmdl">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo usuario
                    </button>

                    <a href="#" 
                            title="Agregar Usuario"  data-toggle="popover" data-trigger="focus"
                            data-content="Sirve para agregar un nuevo usuario al sistema.">
                        <i class="fa fa-fw fa-question-circle pop-help"></i>
                    </a>
                    

                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">

        <div class="card card-body">
            <!-- Para busqueda -->
            <div class="mb-2">
                <?php if (!empty($datos['docente'])) { ?>
                    <div class="col-xl-12">
                                
                        <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                    data-id-curso="<?php echo $datos['id_docente'] ?>"
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover display" id="ajaxTabla">
                    <thead>
                    <tr>
                        <th class='secret'>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th class='secret'>Fecha Nacimiento</th>
                        <th class='secret'>Sexo</th>
                        <th class='secret'>DUI</th>
                        <th class='secret'>NIT</th>
                        <th>Especialidad</th>
                        <th class='secret'>Tipo Usuario</th>
                        <th class='secret'>Password</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones
                            <a href="#" 
                                title="Acciones de gestion"  data-toggle="popover" data-trigger="focus"
                                data-content="Sirven para modificar informacion de un usuario del sistema o darlo de baja">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
                            </a>
                             
                        </th>
                    </tr>
                    </thead>
                    <tbody id="#tbody-table">
                    <?php
                    foreach ($datos['docente'] as $docentes)
                    { ?>
                        <tr id="fila-<?php echo $docentes->id_docente;?>">
                            <td class="secret"><?php echo $docentes->id_docente;?></td>
                            <td><?php echo $docentes->nombres ?></td>
                            <td><?php echo $docentes->apellidos?></td>
                            <td class="secret"><?php echo $docentes->fecha_nacimiento?></td>
                            <td class="secret"><?php echo $docentes->sexo ?></td>
                            <td class="secret"><?php echo $docentes->dui?></td>
                            <td class="secret"><?php echo $docentes->nit ?></td>
                            <td><?php echo $docentes->especialidad ?></td>
                            <td class="secret"><?php echo $docentes->tipo_usuario?></td>
                            <td class="secret"><?php echo $docentes->pass ?></td>
                            <td><?php if($docentes->estado ==1) {
                                echo 'ACTIVO';}else{ echo 'INACTIVO';} ?></td>
                            <td class='shrink'><button type='button' class='btn btn-warning btn_editar_usuario' data-toggle='modal' data-target='#agregarUsuario'><span class='fa fa-edit'></span> Editar</button></td>
                            <td class='shrink'><button id='btn_eliminar3' onclick='menjaseBaja("docente/updateDown/<?php echo $docentes->id_docente?>", <?php echo $docentes->id_docente?>)' class='btn btn-danger alert_sweet'><span class='fa fa-warning bigfonts'></span> Dar baja</button></td>
                            </tr>
                            <?php } ?>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <button id='btn_eliminar3' onclick='menjaseEliminar(\"docente/delete/$docentes->id_docente\")' class='btn btn-danger alert_sweet'> Borrar</button> -->
    <div class="modal fade" id="agregarUsuario">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;" id="aggdct">Agregar un nuevo usuario</h4>
          <h4 class="modal-title" style="margin: 0% auto; display:none;" id="mdfdct">Modificar un usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="dct" method="POST" action="<?php echo RUTA_URL ?>/docente/create" data-parsley-validate novalidate >

                        <input type="hidden" name="did" id="did">

                        <label for="dnombres" class="mrg-spr-ex">Nombres del usuario: </label>
                        <input type="text" name="dnombres" id="dnombres" placeholder="Escribe los nombres del usuario" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                        <label for="dapellidos" class="mrg-spr-ex">Apellidos del usuario:</label>
                        <input type="text" name="dapellidos" id="dapellidos" placeholder="Escribe los apellidos del usuario" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü ]{1,64}'> 

                        <label for="dfecha_nacimiento" class="mrg-spr-ex">Fecha de nacimiento del usuario:</label>
                        <input type="date" name="dfechanacimiento" id="dfecha" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 65 year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 18 year  -3 month"));?>"> 
                        
                        <label class="mrg-spr-ex" >Sexo del usuario:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dsexo" id="rsexo1" value="MASCULINO" required>
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dsexo" id="rsexo2" value="FEMENINO" required>
                                        Femenimo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dsexo" id="rsexo3" value="INEDFINIDO" required>
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
                        <input type="text" name="despecialidad" id="despecialidad" placeholder="Escribe la especialidad del usuario" 
                        class="form-control pad-extra-input" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9/.#, ]{1,64}'>

                        <label class="mrg-spr-ex" >Tipo de usuario:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dtipo_usuario" id="tipo1" value="ADMINISTRADOR" required>
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="dtipo_usuario" id="tipo2" value="DOCENTE" required>
                                        Docente
                                    </label>
                                </div>         
                            </div>

                        <label for="ppass" class="mrg-spr-ex">Ingresa un password para el usuario:</label>
                        <a href="#" 
                                title="Sobre password"  data-toggle="popover" data-trigger="focus"
                                data-content="Ingresa un password que sea seguro, que lleve mayusculas y minisculas, algunos caracteres especiales estan permitidos">
                            <i class="fa fa-fw fa-question-circle pop-help"></i>
                            </a>
                        <input type="password" name="dpass" id="dpass" placeholder="Escribe un password para el participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'>

                        <!-- <label for="ppassc" class="mrg-spr-ex">Confirma el password para el participante:</label>
                        <input type="password" name="ppassc" placeholder="Confirma el password para el participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'> -->

                        <label class="mrg-spr-ex" >Estado del usuario:</label>
                            <div style="margin-left:2em;" class=''>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="destado" id="destado1" value="1" required checked>
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="destado" id="destado2" value="0" required>
                                        Inactivo
                                    </label>
                                </div>         
                            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar cambios" name="guardar_participante">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" id="cancelmdldocente">Cancelar</button>
            </form>
            
        </div>
        
      </div>
    </div>
</div>

<script src="<?php echo RUTA_URL ?>/js/views/docentes.js"></script>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>