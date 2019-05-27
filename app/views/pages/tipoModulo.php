<?php
/*Importacion de Header de la aplicacion*/
require_once RUTA_APP . '/views/include/header.php';

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $datos['titulo'] ?>
            <small><?php echo $datos['descripcion'] ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                        <?php
                        foreach ($datos['tipoModelo'] as $tipoModelos) {
                            echo "<tr>
                                <td>$tipoModelos->nombre</td>
                                <td>$tipoModelos->estado</td>
                                <td><a href='' class=' btn btn-warning'><span class='fa fa-edit'></span> Editar</a></td>
                                <td><a href='' class='btn btn-danger'><span class='fa fa-trash'></span> Eliminar</a></td>
                                </tr>
                                ";
                        }
                        ?>
                    </table>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>