<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>
 <!-- BEGIN CSS for this page -->
 <style>
        .parsley-error {
            border-color: #ff5d48 !important;
        }

        .parsley-errors-list.filled {
            display: block;
        }

        .parsley-errors-list {
            display: none;
            margin: 0;
            padding: 0;
        }

        .parsley-errors-list > li {
            font-size: 12px;
            list-style: none;
            color: #ff5d48;
            margin-top: 5px;
        }

        .form-section {
            padding-left: 15px;
            border-left: 2px solid #FF851B;
            display: none;
        }

        .form-section.current {
            display: inherit;
        }
    </style>

    <!-- Start content -->
    <div class="content">

    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left"><?php echo $datos['titulo'] ?>&nbsp;  </h1>

                    <!-- El boton para agregar a traves de un modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover display">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha Nacimiento</th>
                        <th>Sexo</th>
                        <th>DUI</th>
                        <th>NIT</th>
                        <th>Carnet</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['participante'] as $participantes) {
                        echo "<tr>
                                <td>$participantes->nombres</td>
                                <td>$participantes->apellidos</td>
                                <td>$participantes->fecha_nacimiento</td>
                                <td>$participantes->sexo</td>
                                <td>$participantes->dui</td>
                                <td>$participantes->nit</td>
                                <td>$participantes->carnet_minoridad</td>
                                <td>$participantes->direccion</td>
                                <td>$participantes->telefono</td>
                                <td>$participantes->email</td>
                                <td>$participantes->pass</td>
                                <td>$participantes->estado</td>
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
    <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl  modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="margin: 0% auto;">Agregar un nuevo participante</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                    <form  id="prt" action="#" autocomplete="off" action="#" data-parsley-validate novalidate >

                        <label for="pnombres" class="mrg-spr-ex">Nombres del participante: </label>
                        <input type="text" name="pnombres" placeholder="Escribe los nombres del participante" 
                        class="form-control " required pattern='[a-zA-zÑñ ]{1,64}'>

                        <label for="papellidos" class="mrg-spr-ex">Apellidos del participante:</label>
                        <input type="text" name="papellidos" placeholder="Escribe los apellidos del participante" 
                        class="form-control " required pattern='[a-zA-zÑn ]{1,64}'> 

                        <label for="pfecha_nacimiento" class="mrg-spr-ex">Fecha de nacimiento del participante:</label>
                        <input type="date" name="pfechanacimiento" placeholder="DD/MM/AAAA" class="form-control" required
                        min="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 29 year  -3 month"));?>" 
                        max="<?php echo  date("Y-m-d",strtotime(date("Y-m-d")."- 16 year  -3 month"));?>"> 
                        
                        <label class="mrg-spr-ex" >Sexo del participante:</label>
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

                        <label for="pdui" class="mrg-spr-ex">DUI del participante:</label>
                        <input type="text" name="pdui" id="pdui" placeholder="Ingresa si posee Ej. 0123456-0" 
                        class="form-control pad-extra-input"  pattern='[0-9]{8}[-]{1}[0-9]{1}'>
                        
                        <label for="pnit" class="mrg-spr-ex">NIT del participante:</label>
                        <input type="text" name="pnit" id="pnit" placeholder="Ingresa si posee Ej. 0210-010101-100-1" 
                        class="form-control pad-extra-input" pattern='[0-9]{4}[-]{1}[0-9]{6}[-]{1}[0-9]{3}[-]{1}[0-9]{1}'>
                        
                        <label for="pcarnet_minoridad" class="mrg-spr-ex">Carnet de minoridad del participante:</label>
                        <input type="text" name="pcarnet_minoridad" id="pcarnet" placeholder="Ingresa si posee Ej. 1234567" 
                        class="form-control pad-extra-input" pattern='[0-9]{7}'>
                        
                        <label for="pdireccion" class="mrg-spr-ex">Direccion del participante:</label>
                        <input type="text" name="pdireccion" placeholder="Escribe la direccion del participante" 
                        class="form-control pad-extra-input" required pattern='[a-zA-z0-9/.#, ]{1,64}'>

                        <label for="pdtelefono" class=" mrg-spr-ex">Telefono del participante:</label>
                        <input type="text" name="ptelefono" id="ptelefono" placeholder="Escribe el telefono del participante" 
                        class="form-control   fgk-dis-ctrl" required pattern='[0-9]{4}[-]{1}[0-9]{4}'>
                        
                        <label for="pemail" class="mrg-spr-ex">Email del participante:</label>
                        <input type="email" name="pemail" placeholder="Escribe el email del participante" 
                        class="form-control pad-extra-input" required pattern='[0-9a-zA-Z-_@.]{1,255}'>

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