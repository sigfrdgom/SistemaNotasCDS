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
                        <th>Especialidad</th>
                        <th>Tipo Usuario</th>
                        <th>Password</th>
                        <th>Estado</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['docente'] as $docentes) {
                        echo "<tr>
                                <td>$docentes->nombres</td>
                                <td>$docentes->apellidos</td>
                                <td>$docentes->fecha_nacimiento</td>
                                <td>$docentes->sexo</td>
                                <td>$docentes->dui</td>
                                <td>$docentes->nit</td>
                                <td>$docentes->especialidad</td>
                                <td>$docentes->tipo_usuario</td>
                                <td>$docentes->pass</td>
                                <td>$docentes->estado</td>
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