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
                <h1 class="main-title float-left"><?php echo $datos['titulo'] ?></h1>
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


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>