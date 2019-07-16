<?php
/*Importacion de Header de la aplicacion*/
// require_once RUTA_APP . '/views/include/header.php';
require_once RUTA_APP . '/views/include/headerPadre.php';
?>

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?php echo $datos['titulo'] ?> &nbsp;</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Notas</li>
                            <li class="breadcrumb-item active"><?php echo $datos['titulo'] ?></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card-deck" style="margin: 0 auto">
                <?php
                if (empty($datos['modulos'])){
                    ?>
                    <div class="card ">
                        <h2 class="centrado">No hay registros</h2>
                    </div>
                    <?php
                }else{
                foreach ($datos['modulos'] as $modulos) {
                ?>
                <div class="card p-2 card-mostrar">
                    <form action="<?php echo constant('RUTA_URL') ?>/notas/calificaciones/<?php echo $datos['id_curso'] ?>/<?php echo $modulos->id_modulo ?>" method="post">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $modulos->nombre_modulo ?></h5>
                        <p class="card-text"><?php echo $modulos->descripcion_modulo ?></p>
                        <button type="submit" class="btn btn-success">Ver Modulos</button>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Inicio: <?php echo $modulos->horas_modulo ?></small>
                    </div>
                    </form>
                </div>
                <?php
                }
                } ?>
            </div>
    </div>


<?php
/*Importacion de Footer de la aplicacion */
require_once RUTA_APP . '/views/include/footer.php';
?>