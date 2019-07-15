<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>
<!-- BEGIN CSS for this page -->


    <!-- Start content -->
    <div class="content">

    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp;  </h1>

                    <!-- El boton para agregar a traves de un modal -->
                    <button type="button" class="btn btn-outline-success mb-2"
                    data-toggle="modal" data-target="#agregarParticipante" id="participanteReset">
                        <span class='fa fa-plus-square-o bigfonts'></span> Nuevo participante
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
            <!-- Para busqueda -->
            <div class="mb-2">
                <?php if (!empty($datos['participante'])) { ?>
                    <div class="col-xl-12">
                                
                        <div class="input-group mb-1 float-right col-sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control float-right " placeholder="Busqueda" id="busqueda"
                                    data-id-curso="<?php echo $datos['id_participante'] ?>"
                                    aria-label="Busqueda"
                                    aria-describedby="basic-addon1">
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th class='secret'>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th class='secret'>Fecha Nacimiento</th>
                        <th class='secret'>Sexo</th>
                        <th >DUI</th>
                        <th class='secret'>NIT</th>
                        <th class='secret'>Carnet</th>
                        <th class='secret'>Direccion</th>
                        <th class='secret'>Telefono</th>
                        <th class='secret'>Email</th>
                        <!-- <th>Password</th> -->
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="contenido">
                    <?php
                    //  <td class='bsecreto dp11'>$participantes->pass</td>
                    foreach ($datos['participante'] as $participantes) { ?>
                        <tr>
                                <td class='secret dp0'><?php echo $participantes->id_participante ?></td>
                                <td class=' dp1'><?php echo $participantes->nombres ?></td>
                                <td class=' dp2'><?php echo $participantes->apellidos ?></td>
                                <td class='secret dp3'><?php echo $participantes->fecha_nacimiento ?></td>
                                <td class='secret dp4'><?php echo $participantes->sexo ?></td>
                                <td class=' dp5'><?php echo $participantes->dui ?></td>
                                <td class='secret dp6'><?php echo $participantes->nit ?></td>
                                <td class='secret dp7'><?php echo $participantes->carnet_minoridad ?></td>
                                <td class='secret dp8'><?php echo $participantes->direccion ?></td>
                                <td class='secret dp9'><?php echo $participantes->telefono ?></td>
                                <td class='secret dp10'><?php echo $participantes->email ?></td>
                                
                               
                                <td><?php echo ($participantes->estado == 1? "ACTIVO":"INACTIVO") ?></td>
                                <td class='secret dp12'><?php echo $participantes->pass ?></td>
                                
                                <td class='shrink'> <button type='button' value='Detalles' class='btn_editar_participante btn btn-warning ' data-toggle='modal' data-target='#agregarParticipante'>
                                <span class='fa fa-edit'></span> Editar</td>

                                <td class='shrink'><button id='btn_eliminar2' onclick="menjaseBaja('Participante/updateDown/<?php echo $participantes->id_participante;?>', null)" class='btn btn-danger alert_sweet'><span class='fa fa-trash'></span> Dar baja</button></td>
                                </tr>
                                
                                <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="modal fade" id="agregarParticipante">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title" style="margin: 0% auto;" id="aggp">Agregar un nuevo Participante</h4>
        <h4 class="modal-title" style="margin: 0% auto;" id="mdfp">Modificar un Participante</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="actualizar" method="POST" action="<?php echo RUTA_URL ?>/participante/create"data-parsley-validate novalidate>
                        <section id="demo" onclick='validando()'>
                        <input type="hidden" name="id" id="id">

                        <label for="nombres" class="mrg-spr-ex">Nombres del participante: </label>
                        <input type="text" name="nombres" id="nombres" placeholder="Escribe los nombres del participante" 
                        class="form-control " required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü ]{1,64}'>

                        <label for="papellidos" class="mrg-spr-ex">Apellidos del participante:</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Escribe los apellidos del participante" 
                        class="form-control " required pattern='[a-zA-zÑnÁÉÍÓÚáéíóúü ]{1,64}'> 

                        <label for="fecha_nacimiento" class="mrg-spr-ex">Fecha de nacimiento del participante:</label>
                        <input type="date" name="fecha_nacimiento" placeholder="DD/MM/AAAA" id="fecha_nacimiento"  class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 29 year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 16 year  -3 month"));?>"> 
                        
                        <label class="mrg-spr-ex" >Sexo del participante:</label>
                            <div style="margin-left:2em;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="MASCULINO" required>
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="FEMENINO" required>
                                        Femenimo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo3" value="INDEFINIDO" required>
                                        Indefinido
                                    </label>
                                </div>         
                            </div>


                        <label for="dui" class="mrg-spr-ex">DUI del participante:</label>
                        <input type="text" name="dui" id="dui" placeholder="Ingresa si posee Ej. 0123456-0" 
                        class="form-control pad-extra-input"  pattern='[0-9]{8}[-]{1}[0-9]{1}' required>
                        
                        <label for="nit" class="mrg-spr-ex">NIT del participante:</label>
                        <input type="text" name="nit" id="nit" placeholder="Ingresa si posee Ej. 0210-010101-100-1" 
                        class="form-control pad-extra-input" pattern='[0-9]{4}[-]{1}[0-9]{6}[-]{1}[0-9]{3}[-]{1}[0-9]{1}' required>
                        
                        <label for="carnet_minoridad" class="mrg-spr-ex">Carnet de minoridad del participante:</label>
                        <input type="text" name="carnet_minoridad" id="carnet_minoridad" placeholder="Ingresa si posee Ej. 1234567" 
                        class="form-control pad-extra-input" pattern='[0-9]{7}' required>
                        
                        <label for="direccion" class="mrg-spr-ex">Direccion del participante:</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Escribe la direccion del participante" 
                        class="form-control pad-extra-input" required pattern='[a-zA-zÑñÁÉÍÓÚáéíóúü0-9/.#, ]{1,64}'>

                        <label for="telefono" class=" mrg-spr-ex">Telefono del participante:</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Escribe el telefono del participante" 
                        class="form-control   fgk-dis-ctrl" required pattern='[0-9]{4}[-]{1}[0-9]{4}'>
                        
                        <label for="email" class="mrg-spr-ex">Email del participante:</label>
                        <input type="email" name="email" id="email" placeholder="Escribe el email del participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z-_@.]{1,255}'>
                    
                        <div id="password">
                        <label for="pass" class="mrg-spr-ex">Ingresa un password para el participante:</label>
                        <input type="password" name="pass" id="pass" placeholder="Escribe un password para el participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z]{1,20}'>


                        </div>

                        

                        
                            <div style="margin-left:2em;" hidden='true' id="SeteoEstado">
                            <label class="mrg-spr-ex" >Estado del participante:</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="estado" id="estado1" value="1"  checked> 
                                        Activo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="estado" id="estado2" value="0">
                                        Inactivo
                                    </label>
                                </div>         
                            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <input type="submit"  class="btn btn-success" value="Guardar" name="guardar_participante">
                </section>
            </form>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelparticipante">Cancelar</button>
        </div>
        
      </div>
    </div>
</div>


<script src="<?php echo RUTA_URL ?>/js/views/participantes.js"></script>

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>