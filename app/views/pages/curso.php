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
                        <th>Nombre</th>
                        <th>Cohorte</th>
                        <th>Descripcion</th>
                        <th>Duracion</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th>Nivel</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($datos['curso'] as $cursos) {
                        echo "<tr>
                                <td>$cursos->nombre_curso</td>
                                <td>$cursos->cohorte</td>
                                <td>$cursos->descripcion</td>
                                <td>$cursos->duracion</td>
                                <td>$cursos->sede</td>
                                <td>$cursos->estado</td>
                                <td>$cursos->nivel</td>
                                <td>$cursos->fecha_inicio</td>
                                <td>$cursos->fecha_fin</td>
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